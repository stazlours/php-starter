<?php

namespace App\Core;

class Cli
{
    public static function run(array $argv): void
    {
        if (count($argv) < 2) {
            echo "Usage: php artisan <command> [args]\n";
            return;
        }

        $command = $argv[1];
        $args = array_slice($argv, 2);

        switch ($command) {
            case 'make:controller':
                self::makeController($args);
                break;
            case 'make:model':
                self::makeModel($args);
                break;
            case 'make:view':
                self::makeView($args);
                break;
            case 'make:service':
                self::makeService($args);
                break;
            default:
                echo "Commande inconnue : $command\n";
        }
    }

    // -------------------- CONTROLLER --------------------
    protected static function makeController(array $args): void
    {
        if (empty($args)) {
            echo "Usage: php artisan make:controller ControllerName\n";
            return;
        }

        $name = $args[0];
        $dir = __DIR__ . '/../Controllers';
        Helpers::ensureDir($dir);

        $filePath = "$dir/$name.php";

        if (file_exists($filePath)) {
            echo "Le contrôleur $name existe déjà.\n";
            return;
        }

        $template = <<<PHP
<?php

namespace App\Controllers;

use App\Core\View;

class $name
{
    public function index()
    {
        View::render('home', [
            'title' => 'Bienvenue',
            'name' => 'Stone Starter'
        ]);
    }
}

PHP;

        file_put_contents($filePath, $template);
        echo "Contrôleur $name créé avec succès dans app/Controllers/$name.php\n";
    }

    // -------------------- MODEL --------------------
    protected static function makeModel(array $args): void
    {
        if (empty($args)) {
            echo "Usage: php artisan make:model ModelName\n";
            return;
        }

        $name = $args[0];
        $dir = __DIR__ . '/../Models';
        Helpers::ensureDir($dir);

        $filePath = "$dir/$name.php";

        if (file_exists($filePath)) {
            echo "Le modèle $name existe déjà.\n";
            return;
        }

        $template = <<<PHP
<?php

namespace App\Models;

class $name
{
    // Ajoutez vos propriétés et méthodes ici
}

PHP;

        file_put_contents($filePath, $template);
        echo "Modèle $name créé avec succès dans app/Models/$name.php\n";
    }

    // -------------------- VIEW --------------------
    protected static function makeView(array $args): void
    {
        if (empty($args)) {
            echo "Usage: php artisan make:view view.name\n";
            return;
        }

        $view = $args[0];
        $path = __DIR__ . '/../Views/' . str_replace('.', '/', $view) . '.blade.php';
        $dir = dirname($path);
        Helpers::ensureDir($dir);

        if (file_exists($path)) {
            echo "La vue $view existe déjà.\n";
            return;
        }

        $template = <<<HTML
@extends('layouts.app')

@section('content')
<h1>$view</h1>
@endsection
HTML;

        file_put_contents($path, $template);
        echo "Vue $view créée avec succès dans Views/$view.blade.php\n";
    }

    // -------------------- SERVICE --------------------
    protected static function makeService(array $args): void
    {
        if (empty($args)) {
            echo "Usage: php artisan make:service ServiceName\n";
            return;
        }

        $name = $args[0];
        $dir = __DIR__ . '/../Services';
        Helpers::ensureDir($dir);

        $filePath = "$dir/$name.php";

        if (file_exists($filePath)) {
            echo "Le service $name existe déjà.\n";
            return;
        }

        $template = <<<PHP
<?php

namespace App\Services;

class $name
{
    // Ajoutez vos méthodes ici
}

PHP;

        file_put_contents($filePath, $template);
        echo "Service $name créé avec succès dans app/Services/$name.php\n";
    }
}
