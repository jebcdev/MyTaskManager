Aquí tienes el README con mejor formato y organización para facilitar la comprensión:

---

# My Tasks Manager

Este proyecto utiliza Laravel con Breeze y la plantilla AdminLTE para la gestión de tareas. A continuación, se detallan los pasos de configuración inicial.

## Repositorio

[GitHub - MyTaskManager](https://github.com/jebcdev/MyTaskManager)

## Requisitos

1. Laravel instalado globalmente:
    ```bash
    composer global require laravel/installer && laravel --version
    ```

## Creación del Proyecto

1. Cambia el directorio a tu servidor local:
    ```bash
    cd d:/laragon/www/
    ```

2. Crea el proyecto con Breeze (con soporte para Blade):
    ```bash
    laravel new MyTaskManager --breeze
    ```
    Selecciona `Blade` como frontend y habilita el modo oscuro.

3. Inicia Laragon y verifica la URL del dominio virtual `.test` en:
    ```
    http://mytaskmanager.test/
    ```

## Configuración del Proyecto

### Configurar `.env`

Edita el archivo `.env` en la raíz del proyecto con los siguientes valores:

```env
APP_NAME="My Tasks Manager"
APP_TIMEZONE="America/Bogota"
APP_URL=http://mytaskmanager.test
APP_LOCALE=es
DB_FOREIGN_KEYS=true
```

### Configurar `app.php`

Edita `config/app.php` con estas configuraciones para que Laravel las tome desde el `.env`:

```php
'name' => env('APP_NAME', 'My Tasks Manager'),
'env' => env('APP_ENV', 'local'),
'debug' => (bool) env('APP_DEBUG', true), // Muestra errores en desarrollo
'url' => env('APP_URL', 'http://mytaskmanager.test'),
'timezone' => env('APP_TIMEZONE', 'America/Bogota'),
'locale' => env('APP_LOCALE', 'es'),
```

### Instalar el Paquete de Idiomas

Para agregar soporte en español:

```bash
composer require laravel-lang/common --dev
php artisan lang:add es
php artisan lang:update
```

Esto creará una carpeta `lang` en la raíz del proyecto. Puedes agregar traducciones en el archivo `es.json`.

### Instalar AdminLTE

1. Instala la plantilla:
    ```bash
    composer require jeroennoten/laravel-adminlte
    php artisan adminlte:install
    ```

2. Configura `config/adminlte.php`:
    ```php
    'title' => 'My Tasks Manager',
    'logo' => '<b>MTM</b>',
    'logo_img_alt' => 'Logo',
    'enabled' => false,
    'usermenu_header' => true,
    'classes_topnav' => 'navbar-black navbar-dark',
    'sidebar_scrollbar_theme' => 'os-theme-dark',
    'right_sidebar_scrollbar_theme' => 'os-theme-dark',
    'use_route_url' => true,
    'dashboard_url' => 'dashboard',
    'menu' => [
        ['header' => 'My Tasks Manager'],
        [
            'text' => 'profile',
            'url' => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
    ],
    ```

## Configuración de Vistas

### Vista `admin.index`

```blade
@extends('adminlte::page')

@section('title')
    {{ config('app.name') }}
@stop

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">
            <!-- Título de la sección -->
        </h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">
            <!-- Texto del botón -->
        </a>
    </div>
</div>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
```

## Crear Seeder para Usuarios

1. Crea el seeder:
    ```bash
    php artisan make:seeder UserSeeder
    ```

2. Edita `UserSeeder.php` para agregar usuarios de ejemplo:

    ```php
    <?php

    namespace Database\Seeders;

    use Carbon\Carbon;
    use App\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
    {
        public function run(): void
        {
            // admin
            User::create([
                'name' => '{ JEBC-DeV }',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
            ]);

            // user
            User::create([
                'name' => 'User',
                'email' => 'user@user.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
            ]);

            // guest
            User::create([
                'name' => 'Guest',
                'email' => 'guest@guest.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('12345678'),
            ]);
        }
    }
    ```

## Instalar Ibex/Crud Generator

Para agilizar la creación de CRUDs:

```bash
composer require ibex/crud-generator --dev
php artisan vendor:publish --tag=crud
```
