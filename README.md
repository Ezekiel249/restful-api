# 📚 Laravel Authors & Books Management System

This is a Laravel-based web application to manage **Authors** and their **Books**. The system allows users to create, read, update, and delete authors and books, as well as view the relationship between them.

---

## 🚀 Features

- CRUD operations for Authors
- CRUD operations for Books
- One-to-Many relationship (One Author → Many Books)
- API endpoints (optional)
- Laravel Breeze or Laravel UI for authentication (if included)
- Validation and error handling
- RESTful routes
- Database seeding for test data

---

## 📦 Requirements

- PHP >= 8.1
- Composer
- MySQL or any supported database
- Laravel 10+
- Node.js & npm (for frontend assets, if used)

---

## 🛠️ Installation

1. **Clone the repository**

```bash
git clone https://github.com/your-username/laravel-authors-books.git
cd laravel-authors-books
````

2. **Install PHP dependencies**

```bash
composer install
```

3. **Create environment file**

```bash
cp .env.example .env
```

4. **Set up your database in `.env`**

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **Generate application key**

```bash
php artisan key:generate
```

6. **Run migrations and seeders (optional)**

```bash
php artisan migrate --seed
```

7. **Run the server**

```bash
php artisan serve
```


---

## 🧱 Database Structure

* **Authors**

  * `id`, `author_name`.....

* **Books**

  * `id`, `Book_title`, `book_isbn`, `published_year`, `created_at`, `updated_at`

---

## 📡 API Routes (optional)

If you enabled API support:

| Method | Endpoint          | Description          |
| ------ | ----------------- | -------------------- |
| GET    | /api/author       | List all authors     |
| POST   | /api/author       | Create new author    |
| GET    | /api/author/{id}  | Show specific author |
| PUT    | /api/author/{id}  | Update author        |
| DELETE | /api/author/{id}  | Delete author        |
| GET    | /api/book         | List all books       |
| POST   | /api/book         | Create new book      |
| GET    | /api/book/{id}    | Show specific book   |
| PUT    | /api/book/{id}    | Update book          |
| DELETE | /api/book/{id}    | Delete book          |

Use Postman or a similar tool to test the API endpoints.

---

## 🧪 Testing

```bash
php artisan test
```

You can write your own test cases inside the `tests/` folder.

---

## 📁 Folder Structure Overview

* `app/Models` – Contains `Author.php` and `Book.php`
* `app/Http/Controllers` – Contains logic for authors and books
* `routes/web.php` – Web routes
* `routes/api.php` – API routes (optional)

---

## 📸 Screenshots (Optional)

*Add images of the interface or API responses.*

---

## 🤝 Contributing

Feel free to fork this repository and submit pull requests.

---


---

## ✍️ Author

* [Ezekiel249](https://github.com/Ezekiel249)
