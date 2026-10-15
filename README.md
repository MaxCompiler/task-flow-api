# TaskFlow API 

API RESTful desarrollada con **Laravel** y **MySQL** para la gestión integral de proyectos y tareas. Incorpora autenticación mediante tokens con **Laravel Sanctum**, control de accesos, validación de datos con Form Requests y eliminación en cascada.

---

##  Tecnologías

- **Framework:** Laravel
- **Lenguaje:** PHP 8+
- **Base de Datos:** MySQL
- **Autenticación:** Laravel Sanctum (Bearer Token)
- **Herramientas de prueba:** Thunder Client / Postman

---

##  Funcionalidades

- Registro e inicio de sesión con emisión de tokens de acceso.
- Cierre de sesión seguro con revocación de tokens.
- CRUD completo de proyectos asociados al usuario autenticado.
- Creación, actualización y eliminación de tareas vinculadas a proyectos.
- Eliminación en cascada en base de datos: al borrar un proyecto se eliminan automáticamente sus tareas relacionadas.
- Respuestas estandarizadas en formato JSON y manejo de códigos HTTP (`200`, `201`, `401`, `422`).

---

##  Instalación Rápida

```bash
# 1. Clonar el repositorio
git clone https://github.com/MaxCompiler/task-flow-api.git
cd task-flow-api

# 2. Instalar dependencias
composer install

# 3. Variables de entorno y clave
cp .env.example .env
php artisan key:generate

# 4. Migraciones y servidor local
php artisan migrate
php artisan serve