# Laravel Authorization Microservice

This repository contains a Laravel-based **Authorization Microservice** that manages users, roles, permissions, and audit logs with API endpoints secured using middleware authorization.

---

## Project Structure
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php
│       ├── RoleController.php
│       └── AuditLogController.php
├── Models/
│   ├── User.php
│   ├── Role.php
│   ├── Permission.php
│   └── AuditLog.php
database/
└── migrations/
    ├── users, roles, permissions tables
    ├── pivot tables: role_user, permission_role
    └── audit_logs
routes/
└── api.php

---

## Features

- **User Authentication & Authorization**
  - User registration, login, and token-based authentication (using Sanctum or your preferred method).
- **Role Management**
  - Create, update, and assign roles to users.
- **Permission Management**
  - Define granular permissions and assign them to roles.
- **Role-Permission Relationship**
  - Manage many-to-many relationships between roles and permissions.
- **Audit Logs**
  - Track and store critical actions and changes in the system.
- **Middleware-based Permission Checks**
  - Protect API routes with a custom `CheckPermission` middleware.
- **API Routes**
  - Exposed RESTful API endpoints for managing users, roles, permissions, and audit logs.

---

## Setup Instructions

### Requirements

- PHP >= 8.1
- Composer
- MySQL or any supported database
- Laravel 12
- Optional: Laravel Sanctum (for API authentication)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/laravel-authorization-microservice.git
cd laravel-authorization-microservice

### Installation dependencies

composer install
cp .env.example .env


### Generate application key:
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve

---

### API Endpoints
Method	URI	Description	Middleware
POST	/api/login	User login	Guest
GET	/api/user/permissions	List current user's permissions	auth:sanctum, permission:view-permissions
POST	/api/roles	Create a new role	auth:sanctum, permission:create-roles
POST	/api/permissions	Create a new permission	auth:sanctum, permission:create-permissions
POST	/api/assign-role	Assign role to user	auth:sanctum, permission:assign-roles
GET	/api/audit-logs	Fetch audit logs	auth:sanctum, permission:view-audit-logs

Replace permissions with your actual permission keys as defined in your system.
