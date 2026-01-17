# 📘 Stone Starter – CLI & Make Commands

php-starter/
├─ app/
│  ├─ Core/
│  │  ├─ Cli.php
│  │  ├─ Helpers.php
│  │  └─ View.php
│  ├─ Controllers/
│  │  └─ HomeController.php (exemple)
│  ├─ Models/
│  └─ Services/
├─ Views/
│  ├─ layouts/
│  │  └─ app.blade.php
│  └─ home.blade.php
├─ public/
│  └─ index.php
├─ vendor/
│  └─ autoload.php
├─ composer.json
└─ artisan.php

CLI – Artisan

php artisan.php <command [args]

| Commande          | Usage                                            | Description                               |
| ----------------- | ------------------------------------------------ | ----------------------------------------- |
| `make:controller` | `php artisan.php make:controller HomeController` | Crée un contrôleur dans `app/Controllers` |
| `make:model`      | `php artisan.php make:model User`                | Crée un modèle dans `app/Models`          |
| `make:view`       | `php artisan.php make:view home.index`           | Crée une vue Blade dans `Views/`          |
| `make:service`    | `php artisan.php make:service PaymentService`    | Crée un service dans `app/Services`       |

## Helpers

Helpers::ensureDir($path)

Crée le dossier $path si nécessaire

Utilise @mkdir pour éviter warnings PHP/VS Code

Lance une exception si le dossier ne peut pas être créé

### Exemple de génération

## Créer un contrôleur

php artisan.php make:controller HomeController

## Créer un modèle

php artisan.php make:model User

## Créer une vue

php artisan.php make:view home.index

## Créer un service

php artisan.php make:service PaymentService
