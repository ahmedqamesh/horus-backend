# Eventy Backend

Eventy Backend is a **Laravel-based RESTful API** designed with clean architecture principles, API versioning, and separation of concerns.  
The project follows Laravel’s official directory structure while adding a clear **service and query layer** to keep controllers thin and maintainable.

---

## 🚀 Tech Stack

- **PHP 8+**
- **Laravel 11**
- **MySQL / PostgreSQL** (configurable)
- **Composer** (PHP dependency management)
- **Vite** (frontend tooling support)
- **PHPUnit** (testing)

---

## 📁 Project Structure

```text
eventy-backend/
├── app/                         # Main application source code
│   ├── Http/                    # HTTP layer (API interface)
│   │   ├── Controllers/         # Request handling logic
│   │   │   ├── Api/             # API controllers
│   │   │   │   └── V1/          # API version 1
│   │   │   │       ├── CustomerController.php   # Customer endpoints
│   │   │   │       └── InvoiceController.php    # Invoice endpoints
│   │   │   └── Controller.php   # Base controller
│   │   ├── Requests/            # Form request validation
│   │   │   ├── StoreCustomerRequest.php
│   │   │   ├── UpdateCustomerRequest.php
│   │   │   ├── StoreInvoiceRequest.php
│   │   │   └── UpdateInvoiceRequest.php
│   │   └── Resources/           # API response transformers
│   │       └── V1/
│   │           ├── CustomerResource.php
│   │           ├── CustomerCollection.php
│   │           ├── InvoiceResource.php
│   │           └── InvoiceCollection.php
│   ├── Models/                  # Eloquent ORM models
│   ├── Policies/                # Authorization rules
│   ├── Providers/               # Application service providers
│   └── Services/                # Business logic & query services
│       └── V1/
│           └── CustomerQuery.php # Encapsulated customer queries
├── routes/                      # Route definitions
├── database/                    # Migrations, factories, seeders
├── tests/                       # Feature & unit tests
├── public/                      # Public entry point
├── storage/                     # Logs, cache, file storage
├── config/                      # Application configuration
├── vendor/                      # Composer dependencies
├── artisan                      # Laravel CLI tool
└── vite.config.js               # Frontend build configuration
```
## ⚙️ Installation
```bash
git clone https://github.com/your-username/eventy-backend.git
cd eventy-backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve --host=localhost --port=8080
```

##  🧠 Architectural Principles
API Versioning

- All API logic is versioned under Api/V1
- Allows backward compatibility and safe future changes