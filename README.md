# 🎉 Guest Management APP

An application built with **CodeIgniter 4** to manage event guests.

---

## 🚀 Features

- Create, list, update, and delete guests
- Input validation (name and email)

---

## 🧱 Requirements

- PHP 8.x
- Composer
- MySQL 5.7+
- CodeIgniter 4.x

## ⚙️ Installation

1. Clone the repository:
  ```bash
    git clone https://github.com/orlando6644/guests-frontend.git
    cd guests-frontend
  ```
2. Install dependencies:
  ```bash
    composer install
  ```
3. Configure environment:
- Copy env example file to .env and set the GUEST_API_URL variable to use the external API service.
  ```bash
    GUEST_API_URL = http://localhost:8080/api/guests
  ```
4. Start the local development server:
  ```bash
    php spark serve
  ```

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
