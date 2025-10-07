# Laravel Laravel-AuthCore - Custom Authentication and Admin Dashboard

This project is a complete Laravel starter system with custom authentication, roles, and an admin dashboard.  
It is fully built from scratch without using ready-made authentication packages, allowing full control and easy reuse in any future project.


## Project Overview

The system provides a ready-to-use Laravel structure that includes:
- Custom login, registration, and logout features.
- Role-based access (Admin / User).
- Fully functional Admin Dashboard.
- User management (add, edit, delete, filter).
- Clean and simple Blade templates.
- Ready to integrate with any new Laravel project.


## Installation Steps

1. Clone the repository to your local machine:

git clone https://github.com/MahmoudEbrahimmm/Laravel-Laravel-AuthCore.git


2. Install dependencies:

composer install
npm install && npm run dev



3. Copy the environment file and generate the app key:

cp .env.example .env
php artisan key:generate



4. Configure the database in the `.env` file:

DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

5. Run migrations:

php artisan migrate

## Create Admin User

After running the migrations, you can create an admin user using the following command:

php artisan create:admin


You’ll be asked for:

- Name  
- Email  
- Password  

Then the system will automatically create the admin with full permissions.



## Folder Structure

- **app/Console/Commands** — contains the custom Artisan command `create:admin`.  
- **app/Http/Controllers/Auth** — handles authentication logic.  
- **resources/views** — Blade templates for authentication and dashboard.  
- **routes/web.php** — defines routes and role-based access.  
- **database/migrations** — database tables for users and roles.


## Usage

After installation, start the development server:

php artisan serve

Then open the browser and go to:

http://localhost:8000


Login using the admin credentials you created through the command above to access the admin dashboard.


## Author

**Mahmoud Ebrahim**  
Back-End Developer (PHP & Laravel)  
[GitHub](https://github.com/MahmoudEbrahimmm)  
[LinkedIn](https://www.linkedin.com/in/mahmoud-ebrahim-347057277)  
Email: mahmoud.backend.laravel@gmail.com


## License

This project is open-source and available under the MIT License.