# 🛠️ Sistema de Gestión de Soporte Técnico (Laravel)

Sistema web integral diseñado para la administración de inventario, recepción y entrega de equipos informáticos en talleres de soporte técnico. Este proyecto optimiza el flujo de trabajo desde el ingreso del equipo hasta la entrega final al cliente.

## 🚀 Funcionalidades Principales

* **Dashboard de Métricas:** Panel visual con contadores automáticos para equipos Totales, Pendientes y Listos para Entrega.
* **Gestión CRUD:** Registro completo de ingresos (Cliente, Equipo, Marca, Falla y Estado).
* **Búsqueda Dinámica:** Sistema de filtrado en tiempo real por nombre de cliente o marca del equipo.
* **Generación de Reportes PDF:** Creación automática de comprobantes de recepción profesionales para el cliente (DomPDF).
* **Interfaz Responsiva:** Diseño adaptativo desarrollado con Bootstrap 5, optimizado para PC y dispositivos móviles.

## 🛠️ Stack Tecnológico

* **Backend:** PHP 8.x / Framework Laravel 11.
* **Frontend:** Blade Engine, Bootstrap 5, Flexbox.
* **Base de Datos:** SQLite (Configuración versátil para migración a MySQL).
* **Librerías:** Barryvdh/Laravel-DomPDF para la gestión de documentos.

## 📂 Arquitectura del Proyecto

El sistema sigue el patrón de diseño **MVC (Modelo-Vista-Controlador)**, garantizando la separación de responsabilidades y la escalabilidad del código:

* **Modelos:** Gestión de datos con Eloquent ORM.
* **Controladores:** Lógica de negocio centralizada y rutas optimizadas.
* **Vistas:** Plantillas Blade modulares para una interfaz limpia.

## 🔧 Instalación Local

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/migueln06/gestion-soporte-laravel.git](https://github.com/migueln06/gestion-soporte-laravel.git)
    ```
2.  **Instalar dependencias:**
    ```bash
    composer install
    ```
3.  **Configurar entorno:**
    * Renombrar `.env.example` a `.env`.
    * Generar la clave de aplicación: `php artisan key:generate`.
4.  **Migraciones y Base de Datos:**
    ```bash
    php artisan migrate
    ```
5.  **Iniciar Servidor:**
    ```bash
    php artisan serve
    ```

---
Desarrollado por **Miguel Netti** - *Técnico Superior Universitario en Informática.*