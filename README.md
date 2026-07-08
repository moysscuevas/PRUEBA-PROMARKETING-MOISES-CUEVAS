# Player Notes Module - Technical Test

## Overview

This project is a technical assessment developed with **Laravel 9** and **Livewire**.

The objective is to implement a **Player Notes** module that allows support agents to view and create internal notes for a specific player while following a clean architecture using the **Repository Pattern**.

---

## Technologies

* PHP 8.2
* Laravel 9
* Livewire 2
* MySQL
* Laravel Breeze
* Spatie Laravel Permission

---

## Features

* Player Notes module
* List notes by player
* Create new notes
* Form validation
* Automatic refresh using Livewire
* Permission-based note creation
* Repository Pattern
* Service Layer
* Feature Test

---

## Architecture

```
app/
├── Http/
│   └── Livewire/
│       └── PlayerNotes/
├── Models/
├── Repositories/
├── Services/
├── Providers/
└── ...
```

The application follows a layered architecture:

```
Livewire
    ↓
Service
    ↓
Repository Interface
    ↓
Repository
    ↓
Eloquent Models
```

---

## Installation

Clone the repository:

```bash
git clone <repository-url>
```

Enter the project:

```bash
cd player-notes-test
```

Install dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Compile assets:

```bash
npm run dev
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure the database credentials in the `.env` file.

Run migrations and seeders:

```bash
php artisan migrate:fresh --seed
```

Start the application:

```bash
php artisan serve
```

---

## Test User

The seeder creates the following administrator user:

Email:

```
admin@test.com
```

Password:

```
12345678
```

*(If you changed the password during development, use the updated password.)*

---

## Access

After login:

```
Dashboard
    ↓
Players
    ↓
View Notes
```

You can:

* View all notes for a player.
* Add new notes (if the authenticated user has permission).
* Notes refresh automatically without reloading the page.

---

## Permissions

The module uses **Spatie Laravel Permission**.

Permission required:

```
create player notes
```

Only users with this permission can create new notes.

---

## Running Tests

Execute:

```bash
php artisan test
```

---

## Design Decisions

* Repository Pattern to separate data access.
* Service Layer to isolate business logic.
* Livewire for reactive UI without page reloads.
* Eloquent Relationships.
* SOLID principles.
* Dependency Injection.
* Type Hinting and Return Types.

---

## Author

Moisés Cuevas Pereira
