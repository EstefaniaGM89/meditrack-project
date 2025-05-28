MediTrack – Aplicación de Gestión de Pacientes y Medicación

**MediTrack** es una aplicación web desarrollada con PHP, Laravel, MySQL, Blade, Javascript y Tailwind CSS, orientada a profesionales sanitarios que necesitan gestionar pacientes, tratamientos médicos y recordatorios de medicación de forma centralizada, segura y eficiente.

**Descripción general**

Esta aplicación permite:

⦁	Registrar y administrar pacientes.
⦁	Añadir y gestionar medicamentos.
⦁	Crear recordatorios programados para la administración de medicación.
⦁	// Preparado para implementar pero no en uso: Registrar datos de salud del paciente (tensión arterial, pulso, etc.).
⦁	Gestionar el personal sanitario autorizado para acceder a la plataforma.

Instalación

1. Clonar el repositorio o descargar el proyecto.
2. Instalar las dependencias de Laravel:
   composer install
3. Instalar las dependencias del frontend:
   npm install && npm run build
4. Crear y configurar el archivo .env:
   cp .env.example .env
   php artisan key:generate
   Configurar las variables de conexión a la base de datos en el archivo .env.
5. Generar la clave de la app y ejecutar migraciones 
   php artisan key:generate
   php artisan migrate
6. Iniciar el servidor de desarrollo:
   php artisan serve
7. Iniciar la aplicación
    npm run dev

Acceder a la aplicación desde el navegador en: http://127.0.0.1:8000/

**Requisitos del sistema**

⦁	PHP 8.2 o superior
⦁	Composer
⦁	Node.js y npm
⦁	MySQL
⦁	Navegador web

**Estructura del proyecto**

⦁	app/Http/Controllers/ – Controladores de la lógica de negocio
⦁	app/Models/ – Modelos de 
⦁  app/Notifications - Controlador de notificaciones - Implementado sin uso, para un futuro
⦁	resources/views/ – Plantillas Blade del frontend
⦁  resources/css/ - estilos
⦁  resources/js/ - Scripts interactivos
⦁	routes/web.php – Definición de rutas
⦁	database/migrations/ – Migraciones de la base de datos
⦁	public/ – Archivos públicos

**Usuario de prueba**

Se puede registrar un nuevo usuario desde el formulario de registro. El sistema está preparado para gestionar múltiples cuentas de personal sanitario.

**Tecnologías utilizadas**

⦁   PHP
⦁	Laravel 12
⦁	MySQL
⦁	Blade (motor de plantillas)
⦁	JavaScript
⦁	CSS
⦁   Tailwind CSS

**Stack y herramientas adicionales**

*Flowbite*: biblioteca de componentes UI basada en Tailwind CSS. Se utiliza para botones, formularios, modales, etc.
*Vite*: herramienta moderna de construcción frontend, usada para compilar JS/CSS y proporcionar recarga en caliente durante el desarrollo.

**Autora**

Estefanía
Proyecto Final del Ciclo Superior en Desarrollo de Aplicaciones Web (DAW)
Año: 2025