TASKFLOW API

Este proyecto consiste en una API REST desarrollada con Laravel y MySQL para administrar proyectos y sus tareas. Permite registrar usuarios, iniciar sesión y realizar las operaciones necesarias para crear, consultar, editar y eliminar proyectos y tareas.

TECNOLOGIAS

- Laravel
- PHP 8+
- MySQL
- Laravel Sanctum para la autenticación
- Thunder Client y Postman para probar los endpoints

FUNCIONALIDADES

- Registro e inicio de sesión de usuarios.
- Generación y eliminación de tokens de acceso.
- Crear, consultar, actualizar y eliminar proyectos.
- Agregar tareas a los proyectos.
- Modificar y eliminar tareas.
- Cada usuario puede gestionar sus propios proyectos.
- Al eliminar un proyecto, también se eliminan sus tareas relacionadas (cascada).
- Las respuestas de la API se manejan en formato JSON.

REPOSITORIO

https://github.com/MaxCompiler/task-flow-api.git

INSTALACION

1. Clonar el repositorio:
git clone https://github.com/MaxCompiler/task-flow-api.git
cd task-flow-api

2. Instalar las dependencias:
composer install

3. Crear el archivo de configuración:
cp .env.example .env
Luego, configurar los datos de conexión a MySQL en el archivo .env.

4. Generar la clave de Laravel:
php artisan key:generate

5. Ejecutar las migraciones:
php artisan migrate

6. Iniciar el servidor:
php artisan serve

ENDPOINTS

Para las peticiones se recomienda incluir la cabecera:
Accept: application/json

AUTENTICACION

POST /api/register
Permite registrar un usuario.
Body:
{
  "name": "string",
  "email": "string",
  "password": "string"
}

POST /api/login
Permite iniciar sesión y obtener el token de acceso.
Body:
{
  "email": "string",
  "password": "string"
}

RUTAS PROTEGIDAS

Para utilizar las rutas protegidas, se debe enviar el token obtenido al iniciar sesión en los Headers:
Authorization: Bearer TU_TOKEN

PROYECTOS

GET /api/projects
Obtiene la lista de proyectos del usuario.

POST /api/projects
Registra un nuevo proyecto.
Body:
{
  "title": "string",
  "description": "string"
}

GET /api/projects/{id}
Muestra la información de un proyecto.

PUT/PATCH /api/projects/{id}
Permite modificar los datos de un proyecto.
Body:
{
  "title": "string",
  "description": "string"
}

DELETE /api/projects/{id}
Elimina un proyecto junto con las tareas que tiene asociadas.

TAREAS

POST /api/projects/{project}/task
Crea una tarea dentro de un proyecto.
Body:
{
  "title": "string",
  "status": "string"
}

PUT/PATCH /api/tasks/{task}
Permite actualizar el título o el estado de una tarea.
Body:
{
  "title": "string",
  "status": "string"
}

DELETE /api/tasks/{task}
Elimina una tarea específica.

SESION

POST /api/logout
Cierra la sesión eliminando el token de acceso actual.