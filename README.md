# PHP Starter - StoneFw Lite

Une base **PHP ultra légère**, **extensible** et **Blade-like** sans dépendance externe, pour démarrer rapidement vos projets.

---

## 🔹 Fonctionnalités

- Autoload PSR-4 via Composer
- Router minimaliste
- Mini moteur de vues "Blade-like" :
  - `@extends`, `@section`, `@yield`
  - `{{ $variable }}`
- Structure propre pour Controllers, Views, Routes
- Zéro dépendance externe
- Facilement extensible (Middleware, CLI, Services, Cache…)

---

## 🗂 Structure du projet

```txt
php-starter/
├─ app/
│  ├─ Controllers/
│  │  └─ HomeController.php
│  ├─ Core/
│  │  ├─ App.php
│  │  ├─ Router.php
│  │  └─ View.php
│  ├─ Routes/
│  │  └─ web.php
│  └─ Views/
│     ├─ layouts/
│     │  └─ app.blade.php
│     └─ home.blade.php
├─ public/
│  └─ index.php
├─ storage/cache/views/
├─ composer.json
└─ README.md
```

🏁 Lancer le projet (local)
php -S localhost:8000 -t public

### ⚡ Créer une nouvelle page

Créer un controller dans app/Controllers/

Créer la vue correspondante dans app/Views/

Ajouter la route dans app/Routes/web.php

### 💡 Notes

Le moteur de vues actuel supporte :

@extends('layouts.app')

@section('content') ... @endsection

@yield('content')

{{ $variable }}

Cache des vues à améliorer

Évolutif pour Middleware, CLI, Auth, Services…
