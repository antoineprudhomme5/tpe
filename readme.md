### Prérequis

- Installer [Composer] (https://getcomposer.org/).
- Installer [Sass](http://sass-lang.com/install).
- Installer [Compass](http://compass-style.org/install/).
- Avoir npm (Node.js)
- Installer des modules de node présents dans *package.json* (gulp, laravel-elixir, bootstrap-sass): `npm install`
- Rajouter sass-compass pour Laravel Elixir: `sudo npm install laravel-elixir-sass-compass`

### Installer le projet

- Après avoir cloner le projet, se rendre (en ligne de commande) à la racine du projet.
- Faire un 'composer install' pour installer toutes les dépendances du projet, car le dossier vendor n'est pas push sur le git.
- Créer un fichier .env à la racine du projet (se baser sur le .env.example déjà présent).
- Configurer dans le .env la connexion à la base de données.
- Générer une nouvelle clé pour le projet en fesant un 'php artisan key:generate'
- Copier la clé et remplacer l'actuelle dans config/app.php ('key' => env('APP_KEY', 'maNouvelleCle')
- Pour finir, il faut construire la base de données. Pour cela :
    - préparer les migrations : 'php artisan migrate:install'
    - effectuer les migrations : 'php artisan migrate'
    - remplir la base de données avec les données de base : 'php artisan db:seed'

Le projet est maintenant pret.

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
