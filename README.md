🧩 RBAC (Role-Based Access Control) API

Manual RBAC system built with Laravel 11 — simple, secure, and scalable.

🔍 Overview

This project implements a Role-Based Access Control (RBAC) API using Laravel 11.
It manages users, roles, and permissions with full CRUD functionality and secure access management.
Ideal for integrating authentication and authorization layers into web or mobile applications.

⚙️ Key Features

✅ Laravel 11 + PHP 8.1+

🔐 Token-based authentication (Laravel Sanctum)

🧠 Manual RBAC logic (no external packages)

👥 Full CRUD for Users, Roles, and Permissions

🎯 Role & Permission assignment endpoints

🧱 Middleware-based access checks

💬 Unified JSON responses

🧪 Ready for Postman or cURL testing

🧰 Setup Instructions
git clone https://github.com/MahmoudEbrahimmm/RBAC.git
cd RBAC
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


Database config: update .env with your DB credentials before running migrations.

🔑 Authentication Endpoints
Method	Endpoint	Description
POST	/api/auth/register	Register a new user
POST	/api/auth/login	Login & receive access token
POST	/api/auth/logout	Logout & revoke token
👤 User Management
Method	Endpoint	Description
GET	/api/users	List users
GET	/api/users/{id}	View user
POST	/api/users	Create user
PUT	/api/users/{id}	Update user
DELETE	/api/users/{id}	Delete user
🧩 Roles & Permissions
Method	Endpoint	Description
GET	/api/roles	List all roles
POST	/api/roles	Create role
POST	/api/roles/{id}/assign-permission	Assign permission
POST	/api/roles/{id}/revoke-permission	Revoke permission
Method	Endpoint	Description
GET	/api/permissions	List all permissions
POST	/api/permissions	Create permission
🧱 Middleware

Custom middlewares protect sensitive routes:

CheckRole → validates user roles

HasPermissions → checks specific permissions

Example usage:

Route::get('/users', 'index')->middleware('hasPermissions:view_users');

⚡ Example cURL Request
curl -X GET "http://localhost:8000/api/users" \
  -H "Accept: application/json" \
  -H "Authorization: Bearer {TOKEN}"

🧪 Testing

Run Laravel’s built-in test suite:

php artisan test

🛡️ Security Notes

Never commit .env files

Use HTTPS in production

Follow password and token policies

📝 License

Released under the MIT License.
© 2025 Mahmoud Ebrahim
