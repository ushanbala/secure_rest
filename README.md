# 🚀 Secure Task Management API (Laravel + Sanctum)

A lightweight, secure, and modern RESTful API built with **Laravel** and protected using **Laravel Sanctum**. This backend powers a Task Management system where all task operations are fully authenticated and isolated per user.

---

## ✨ Features

- **🔐 User Authentication** — Register and log in securely using email/password.  
- **🛡️ Bearer Token Security** — Sanctum generates a unique API token after login; this must be included in all protected routes.  
- **🗂️ Task Management (CRUD)** — Create, read, update, and delete personal tasks.  
- **🔒 Data Isolation** — Each user can only access and manage their own tasks.

---

## ⚙️ Requirements

Make sure the following are installed:

- **PHP 8.1+**
- **Composer**
- **MySQL / MariaDB**
- **Laravel CLI** (optional)

---