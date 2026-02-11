# 🚀 Custom PHP ORM - MVC CRUD Application with Docker & PostgreSQL

A simple MVC-based CRUD application built with PHP, PostgreSQL, and Docker.  
This project demonstrates how to build a custom lightweight ORM and manage a full Dockerized development environment.

---

## 📖 Overview

This project is a basic User Management System that allows you to:

- Create users
- Read users
- Update users
- Delete users

It follows a simple MVC architecture and uses:

- 🐘 PostgreSQL as the database
- 🐳 Docker for containerization
- 🌐 Nginx as a web server
- 🐘 PHP (custom lightweight ORM using PDO)

---

## 🏗️ Tech Stack

- PHP 8+
- PostgreSQL 15
- Nginx
- Docker & Docker Compose
- pgAdmin (for database management)

---



## ⚙️ Installation

### 1️⃣ Clone the repository

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```
### 2️⃣ Configure environment variables
DB_HOST=db
DB_PORT=5432
DB_NAME=your_database
DB_USER=your_user
DB_PASSWORD=your_password

### 3️⃣ Start Docker
```bash
docker compose up -d --build
```
### 4️⃣ Access the application
🌐 App: http://localhost:8080
🛠 pgAdmin: http://localhost:5052

### 🔄 Available Features
- Dynamic INSERT
- UPDATE functionality
- DELETE with confirmation
- Basic routing
- MVC structure
- Dockerized development environment

