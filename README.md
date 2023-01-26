<h1 align="center">Lariele Movie TALL</h1>
<p align="center">
<a href="https://packagist.org/packages/lariele/movie"><img src="https://img.shields.io/github/v/release/lariele/movie" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/lariele/movie"><img src="https://img.shields.io/github/v/tag/lariele/movie" alt="Latest Tag"></a>
<a href="https://packagist.org/packages/lariele/movie"><img src="https://img.shields.io/github/license/lariele/movie" alt="License"></a>
</p>

### Manage Movies with Laravel Livewire component builded with TALL

## Installation

```
composer require lariele/movie
```

## Database

#### Run Database migrations

```
php artisan migrate
```

## Seed Database

#### Publish DB migrations & seeders

```
php artisan vendor:publish --provider="Lariele\Movie\MovieServiceProvider" --tag=database
```

#### Feed DB with Orders

```
php artisan db:seed MovieSeeder
```

## Development

#### Publish views

```
php artisan vendor:publish --provider="Lariele\Movie\MovieServiceProvider" --tag=views
```

#### Dev

```
npm run dev
```

#### Build

```
npm run build
```
