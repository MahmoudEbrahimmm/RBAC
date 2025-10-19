# RBAC (Role-Based Access Control)

> Professional README for a manual RBAC (Roles & Permissions) API built with **Laravel 11**.

---

## Overview

**RBAC** is a RESTful API built using Laravel 11 that implements a Role-Based Access Control system. It allows you to manage users, roles, and permissions with secure API endpoints designed for integration with web or mobile applications.

The main goal is to provide a solid foundation for authentication, authorization, and fine-grained access control, while maintaining clarity and simplicity.

---

## Key Features

* Laravel 11 + PHP 8.1+
* Token-based authentication via **Laravel Sanctum**
* Manual RBAC logic (no external packages required)
* Full CRUD for Users, Roles, and Permissions
* Role/Permission assignment and revocation
* Middleware-based access checks
* Consistent JSON responses for all endpoints
* Ready for Postman or cURL testing

---

## Requirements

* PHP >= 8.1
* Composer
* Laravel 11
* MySQL or any supported database
* [Laravel Sanctum]

---

## Local Setup

1. **Clone the repository:**

```bash
git clone https://github.com/MahmoudEbrahimmm/RBAC.git
cd RBAC
```

2. **Install dependencies:**

```bash
composer install
```

3. **Set up your environment file:**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure your database in `.env`:**

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rbac_db
DB_USERNAME=root
DB_PASSWORD=

APP_NAME=RBAC
APP_URL=http://localhost
```

5. **Run migrations and seeders:**

```bash
php artisan migrate
php artisan db:seed
```

> Ensure the `personal_access_tokens` table exists after installing Sanctum.

6. **Run the development server:**

```bash
php artisan serve
```

---

## Sanctum Installation (if not already installed)

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

Then in `app/Models/User.php`, ensure you have:

```php
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
```

---

## Database Structure (Summary)

* **users**
* **roles**
* **permissions**
* **model_has_roles** (pivot)
* **role_has_permissions** (pivot)

> You can use your own structure or integrate with a package like Spatie if desired.

---

## API Endpoints

> All routes return JSON and require `Accept: application/json` header.

### Authentication

| Method | Endpoint             | Description                       |
| ------ | -------------------- | --------------------------------- |
| POST   | `/api/auth/register` | Register a new user               |
| POST   | `/api/auth/login`    | Login and receive an access token |
| POST   | `/api/auth/logout`   | Logout (invalidate token)         |

### Users

| Method    | Endpoint          | Description       |
| --------- | ----------------- | ----------------- |
| GET       | `/api/users`      | Get all users     |
| GET       | `/api/users/{id}` | Get user details  |
| POST      | `/api/users`      | Create a new user |
| PUT/PATCH | `/api/users/{id}` | Update user       |
| DELETE    | `/api/users/{id}` | Delete user       |

### Roles

| Method    | Endpoint          |
| --------- | ----------------- |
| GET       | `/api/roles`      |
| POST      | `/api/roles`      |
| GET       | `/api/roles/{id}` |
| PUT/PATCH | `/api/roles/{id}` |
| DELETE    | `/api/roles/{id}` |

### Permissions

| Method    | Endpoint                |
| --------- | ----------------------- |
| GET       | `/api/permissions`      |
| POST      | `/api/permissions`      |
| GET       | `/api/permissions/{id}` |
| PUT/PATCH | `/api/permissions/{id}` |
| DELETE    | `/api/permissions/{id}` |

### Role/Permission Assignment

| Method | Endpoint                            | Description                 |
| ------ | ----------------------------------- | --------------------------- |
| POST   | `/api/users/{id}/assign-role`       | Assign a role to user       |
| POST   | `/api/users/{id}/revoke-role`       | Remove a role from user     |
| POST   | `/api/roles/{id}/assign-permission` | Assign permission to role   |
| POST   | `/api/roles/{id}/revoke-permission` | Remove permission from role |

---

## Example Requests

### Login

```bash
curl -X POST "http://localhost:8000/api/auth/login" \
  -H "Accept: application/json" \
  -d "email=admin@example.com&password=secret"
```

### Protected Route

```bash
curl -X GET "http://localhost:8000/api/users" \
  -H "Authorization: Bearer {TOKEN}" \
  -H "Accept: application/json"
```

---

## Seeder Example

```php
Role::create(['name' => 'admin']);
Permission::create(['name' => 'manage_users']);

$admin = User::factory()->create(['email' => 'admin@example.com']);
$admin->assignRole('admin');
```

---

## Middleware & Access Control

Create custom middlewares to verify user roles or permissions before accessing routes.
Examples: `CheckRole`, `CheckPermission`.

---

## Error Handling

All responses should follow a unified JSON format:

```json
{
  "success": false,
  "message": "Resource not found",
  "errors": {}
}
```

HTTP Status Codes used: `200`, `201`, `400`, `401`, `403`, `404`, `422`, `500`.

---

## Testing

Use Laravel’s built-in test suite:

```bash
php artisan test
```

Focus on testing: authentication, authorization, CRUD operations, and middleware logic.

---

## Security

* Never commit your `.env` file.
* Add to `.gitignore`: `.env`, `/vendor`, `/node_modules`.
* Implement password policies and optional email verification.

---

## Contributing

Contributions are welcome! Feel free to open an **Issue** or **Pull Request** with detailed explanations.

---

## License

This project is open-sourced under the **MIT License**.

---

## Contact

For questions or feedback, please open an issue on the repository.

---

*End of README*
