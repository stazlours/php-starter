<?php

namespace App\Controllers;

use App\Core\View;

class HomeController
{
    public function index(): void
    {
        View::render('home', [
            'title' => 'Bienvenue',
            'name'  => 'Stone Starter',
            'items' => [
                ['name' => 'Item 1', 'status' => 'actif'],
                ['name' => 'Item 2', 'status' => 'inactif'],
                ['name' => 'Item 3', 'status' => 'actif'],
            ]
        ]);
    }
}
