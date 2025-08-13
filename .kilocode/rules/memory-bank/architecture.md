# Architecture Overview

This project is a web application built on the Laravel framework, adhering to a Model-View-Controller (MVC) architectural pattern. It integrates a modern frontend build process using Vite, Tailwind CSS, and JavaScript.

## System Architecture

The system is composed of a backend (Laravel) and a frontend (Vite-bundled assets), interacting to deliver a dynamic web application.

```mermaid
graph TD
    User --> WebBrowser
    WebBrowser --> |HTTP/HTTPS| LaravelApp[Laravel Application]

    subgraph Laravel Application
        LB[Load Balancer / Web Server] --> PHPFPM[PHP-FPM]
        PHPFPM --> Laravel[Laravel Framework]

        Laravel --> |Routes| Controllers[Controllers]
        Controllers --> Models[Models (Eloquent ORM)]
        Models --> Database[Database]

        Laravel --> Views[Views (Blade)]
        Views --> WebBrowser

        Laravel --> |API Endpoints| Frontend[Frontend (JavaScript/TailwindCSS)]
    end

    Frontend --> |Build Process| Vite[Vite]
    Vite --> |Compiled Assets| WebServer[Web Server (Public Dir)]
    WebServer --> WebBrowser
```

## Source Code Paths

-   **Application Logic:**
    -   `app/Http/Controllers/`: Houses the application's controllers.
    -   `app/Models/`: Contains Eloquent models for database interaction.
    -   `routes/web.php`: Defines web routes.
    -   `routes/api.php` (expected, though not explicitly reviewed): Defines API routes.
-   **Configuration:**
    -   `config/`: Contains various application configuration files (e.g., `app.php`, `database.php`).
    -   `.env` / `.env.example`: Environment variables.
-   **Frontend Assets:**
    -   `resources/js/`: JavaScript source files.
    -   `resources/css/`: CSS source files (Tailwind CSS).
    -   `public/build/assets/`: Compiled frontend assets.
-   **Database:**
    -   `database/migrations/`: Database schema migrations.
    -   `database/factories/`: Eloquent model factories.
    -   `database/seeders/`: Database seeders.
-   **Tests:**
    -   `tests/Feature/`: Feature tests.
    -   `tests/Unit/`: Unit tests.

## Key Technical Decisions

-   **Framework:** Laravel (PHP) for backend development, providing MVC structure, ORM, routing, and other core functionalities.
-   **Frontend Tooling:** Vite for fast and efficient asset bundling and development server, integrated with Laravel via `laravel-vite-plugin`.
-   **CSS Framework:** Tailwind CSS for a utility-first approach to styling, enabling rapid UI development.
-   **Database Abstraction:** Eloquent ORM for object-relational mapping, simplifying database interactions.
-   **Testing Framework:** Pest for PHP unit and feature testing.
-   **Dependency Management:** Composer for PHP dependencies, npm/Yarn for JavaScript dependencies.

## Design Patterns in Use

-   **MVC (Model-View-Controller):** Core architectural pattern separating concerns into models (data), views (UI), and controllers (logic).
-   **Active Record:** Implemented by Eloquent ORM, where models directly represent database tables and instances represent rows.
-   **Dependency Injection:** Laravel's service container facilitates dependency injection throughout the application.

## Component Relationships

-   **Controllers & Models:** Controllers interact with models to perform CRUD operations and retrieve data from the database.
-   **Controllers & Views:** Controllers pass data to Blade views for rendering HTML responses.
-   **Frontend & Backend:** The frontend consumes data and services exposed by the Laravel backend via routes and potentially API endpoints.
-   **Vite & Laravel:** Vite compiles frontend assets, and Laravel's `laravel-vite-plugin` ensures these assets are correctly served and refreshed during development.
