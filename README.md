# 🏆 Nombre del Proyecto

Breve descripción del proyecto. Explica para qué sirve y qué hace.

## 🚀 Tecnologías utilizadas

- PHP 8.1+
- Laravel 10
- MySQL / MariaDB
- Node.js 16+
- Vite (para frontend)

## 📦 Requisitos previos

Asegúrate de tener instalados:

- [PHP 8.1+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [MySQL o MariaDB](https://www.mysql.com/)
- [Node.js 16+ y npm](https://nodejs.org/)
- [Git](https://git-scm.com/downloads)

## 🔧 Instalación y configuración

Sigue estos pasos para configurar el proyecto en tu máquina:

1. **Clonar el repositorio**
   ```sh
   https://github.com/rudoxvanx/prueba-mini-project.git
   cd tu-repositorio

2. **Instalar las dependencias**
    composer install
    npm install

3. **Configurar el archivo .env**

**linux**
    cp .env.example .env

**windows**
    copy .env.example .env


4. **Generar la clave de aplicacion**
php artisan key:generate

5. **Configurar la base de datos**

    - Crea una base de datos en MySQL.
    - Edita el archivo .env y configura los valores

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña
    ```

6. **Ejecutar las migraciones**

     php artisan migrate

7. **Compilar assets del frontend**
    npm run dev

8. **Iniciar el servidor**
php artisan serve


Ahora puedes abrir el proyecto en tu navegador en http://127.0.0.1:8000/.
