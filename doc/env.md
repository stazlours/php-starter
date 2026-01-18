# 📝 Documentation – Mode dev/prod .env et View.php

1️⃣ Fichier .env

À la racine du projet :

APP_ENV=development

development → recompilation automatique des vues à chaque rendu (pratique pour dev)

production → utilisation du cache compilé pour performance

2️⃣ Chargement du .env

Dans public/index.php :

use App\Core\Env;

require_once __DIR__ . '/../vendor/autoload.php';

// Charger les variables d'environnement
Env::load(__DIR__ . '/../.env');

3️⃣ View.php – Moteur de vues

View::render('home', $data) → rend la vue avec compilation automatique en dev

View::clearCache() → vide tout le cache des vues

Gestion des directives Blade-like :

@extends('layouts.app')

@section('content') ... @endsection

@yield('content')

@include('partials.header')

{{ $variable }} (échappé) et {!! $variable !!} (raw)

@if/@elseif/@else/@endif, @foreach/@endforeach, @for/@endfor, @while/@endwhile

Mode dev : recompilation automatique

Mode prod : utilise le cache pour performance

4️⃣ Exemple d’utilisation
// Dev : affichage d'une vue
$data = [
    'title' => 'Bienvenue',
    'name' => 'Stone Starter',
    'items' => ['Item 1', 'Item 2', 'Item 3'],
];
\App\Core\View::render('home', $data);

// Vider le cache si besoin
\App\Core\View::clearCache();

5️⃣ Notes

Toutes les modifications sur les partials ou sections sont visibles immédiatement en mode dev

Le cache compilé est stocké dans : storage/cache/views

.env est utilisé pour basculer entre développement et production
