# Cafeteria

Aplicación web para la gestión de una cafetería, desarrollada con **Laravel 12**, **Tailwind CSS 4** y **MySQL**.

## Características

-   Gestión de productos (crear, editar, eliminar)
-   Gestión de ingredientes (crear, editar, eliminar)
-   Gestión de recetas (crear, editar, eliminar)
-   Registro e inicio de sesión de usuarios
-   Gestión de inventarios, ventas y compras

## Tecnologías utilizadas

-   [Laravel 12](https://laravel.com/docs/12.x)
-   [Tailwind CSS 4](https://tailwindcss.com/)
-   [MySQL](https://www.mysql.com/)
-   [PHP 8.2+](https://www.php.net/)
-   [Composer](https://getcomposer.org/)
-   [Node.js & npm](https://nodejs.org/)

## Instalación

### 1. Clona el repositorio

```bash
git clone https://github.com/Alejandro-Melgar77/cafeteria_Esencia.git
cd cafeteria_Esencia
```

### 2. Instala las dependencias de PHP

```bash
composer install
```

### 3. Instala las dependencias de JavaScript (Tailwind)

```bash
npm install
```

### 4. Configura las variables de entorno

```bash
cp .env.example .env
```

Edita `.env` con tu configuración de base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_cafeteria
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Ejecuta las migraciones y seeders

```bash
php artisan key:generate
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
```

### 6. Inicia el servidor de desarrollo

```bash
composer run dev
```

Abre `http://127.0.0.1:8000` en tu navegador.

Nota: si el programa no se ejecuta, probar con

```
php artisan serve
```

Gracias :)
