# QuickLink - A Simple & Powerful URL Shortener

This is a fully-functional URL shortener web application built with PHP and Laravel 10, as part of an internship task. The application allows users to submit a long URL and receive a shortened, shareable link that redirects to the original destination.

---

## 🚀 Live Demo

**You can test the live application here:**
**[https://disastercontrol.tech](https://disastercontrol.tech)**

---

## ✨ Core Features

*   **Shorten URLs:** Paste any long URL to generate a unique, short link.
*   **Instant Redirects:** Visiting a generated short link immediately redirects to the original long URL.
*   **Modern UI/UX:** A clean, responsive, dark-mode interface with smooth animations.
*   **Technology Showcase:** The landing page explains the "How It Works" process and the backend technology used.

---

## 🛠️ Technology Stack

This project was built using the following technologies as per the requirements:

*   **Backend:** PHP 8.1+ & Laravel 10
*   **Frontend:** Laravel Blade Templating Engine
*   **Styling:** Bootstrap 5 & Custom CSS (animations, dark mode, etc.)
*   **Database:** MySQL (managed by Laravel Eloquent ORM & Migrations)
*   **Deployment:**
    *   **Version Control:** Git & GitHub
    *   **Hosting:** Deployed on a live server managed by CyberPanel.

---

## ✅ Requirements Checklist

The project successfully fulfills all the given requirements:

- [x] **Use Laravel 10+:** The application is built on the latest version of Laravel.
- [x] **Routes:**
    - `GET /` - Shows the main form.
    - `POST /shorten` - Stores the URL and generates the code.
    - `GET /{shortcode}` - Handles the redirection.
- [x] **Blade Templates:** The entire frontend is rendered using Blade.
- [x] **Database Table:** The `urls` table includes `id`, `original_url`, `short_code`, `created_at`, and `updated_at` columns.