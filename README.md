# Sistema de Gestión Estudiantil

Aplicación web construida con Laravel para administrar procesos académicos básicos en un entorno escolar: gestión de estudiantes, docentes, cursos, materias, matrículas, asignaciones docentes y calificaciones.

## Características principales

- Autenticación de usuarios.
- Acceso por roles: administrador, docente y estudiante.
- Dashboard diferenciado según rol.
- CRUD para entidades académicas (zona administrador).
- Registro de calificaciones (zona docente).
- Consulta de notas y promedio general (zona estudiante).

## Stack técnico

- PHP 8.4+
- Laravel 12
- MySQL (configuración activa del proyecto) o SQLite (base en `.env.example`)
- Livewire 3 + Flux UI
- Vite + TailwindCSS

## Requisitos

- PHP 8.2 o superior
- Composer 2+
- Node.js 18+ y npm
- Motor de base de datos (MySQL o SQLite)

## Instalación

1. Clonar el repositorio.
2. Instalar dependencias de PHP:

   ```bash
   composer install
   ```

3. Crear archivo de entorno:

   ```bash
   copy .env.example .env
   ```

4. Generar clave de aplicación:

   ```bash
   php artisan key:generate
   ```

5. Configurar base de datos en `.env`.
6. Ejecutar migraciones y seeders:

   ```bash
   php artisan migrate --seed
   ```

7. Instalar dependencias frontend:

   ```bash
   npm install
   ```

## Ejecución en desarrollo

Puedes usar el flujo completo del proyecto:

```bash
composer dev
```

Este comando levanta servidor Laravel, cola y Vite de forma concurrente.

Si tienes problemas con `php artisan serve` en Windows, usa como alternativa:

```bash
php -S 127.0.0.1:8000 -t public
npm run dev
```

## Despliegue en Railway

Este repositorio ya incluye `nixpacks.toml` para Railway, con:

- PHP 8.4 (evita el error de `symfony/string` con PHP 8.2).
- Instalación de dependencias de Composer y Node.
- Build de assets con Vite.
- Comando de inicio usando `php -S` sobre `public`.

### Pasos

1. Crea un proyecto en Railway y conecta este repositorio.
2. En Variables de Railway configura, como mínimo:
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_KEY` (générala con `php artisan key:generate --show`)
  - `APP_URL` (dominio público de Railway)
  - `DB_CONNECTION=mysql`
  - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
  - `CACHE_STORE=database`
  - `SESSION_DRIVER=database`
  - `QUEUE_CONNECTION=database`
3. Haz deploy.
4. Ejecuta migraciones en Railway (una vez por entorno):

  ```bash
  php artisan migrate --force
  ```

5. Carga datos base (opcional, para pruebas):

  ```bash
  php artisan db:seed --force
  ```

### Solución del error reportado

Si aparece este error en build:

`symfony/string ... requires php >=8.4 -> your php version (8.2.30) does not satisfy that requirement`

Se corrige fijando PHP 8.4 en Railway. En este repo ya queda resuelto con `nixpacks.toml`.

## Credenciales de prueba (seed)

Se crean mediante `UsuarioSeeder`:

- Administrador
  - Correo: admin@colegio.com
  - Contraseña: admin123
- Docentes
  - espanol@colegio.com / docente123
  - naturales@colegio.com / docente123
  - sociales@colegio.com / docente123
  - ingles@colegio.com / docente123

## Scripts útiles

- Desarrollo: `composer dev`
- Build frontend: `npm run build`
- Ejecutar pruebas: `composer test`
- Formatear código (Laravel Pint): `./vendor/bin/pint`

## Módulos del sistema

- Administración
  - Gestión de estudiantes
  - Gestión de docentes y asignaciones
  - Gestión de cursos, materias y matrículas
- Docencia
  - Registro y gestión de calificaciones
- Estudiante
  - Consulta de notas
  - Visualización de promedio general

## Notas

- El proyecto usa rutas con middleware de rol para controlar acceso.
- Asegúrate de tener la base de datos creada y correctamente configurada antes de migrar.

## Licencia

Este proyecto se distribuye bajo licencia MIT.
