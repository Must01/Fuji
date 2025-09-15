# Fuji - Modern Note Taking Application

<div align="center">
<h3>A sleek and modern note-taking application built with Laravel, Livewire, and TailwindCSS.</h3>
</div>

[Check Fuji](https://fuji.laravel.cloud/)

<img width="1865" height="953" alt="image" src="https://github.com/user-attachments/assets/e8332950-b48b-4b35-a2a6-4df528742f9e" />

## ✨ Features

-   🎨 **Custom Color Picker**: Pick any custom color for your notes
-   🌈 **Curated Themes**: 7 carefully selected color themes for quick styling
-   📝 **Rich Text Editing**: Notes now support pure **HTML content**
-   🔡 **Bold Formatting**: Built-in bold button to wrap selected text with `<b>` tags
-   🏷️ **Tag Management**: Organize notes with custom tags
-   🔍 **Search Functionality**: Search notes by name, content, or tags
-   🌓 **Dark Mode Support**: Built-in dark mode for comfortable viewing
-   📱 **Responsive Design**: Works seamlessly on both desktop and mobile devices
-   🔐 **User Authentication**: Secure user authentication and note privacy
-   ⚡ **Real-time Updates**: Powered by Livewire for dynamic interactions

## 🛠️ Tech Stack

-   **Backend**: Laravel 12.x
-   **Frontend**:
    -   Livewire for reactive components
    -   TailwindCSS for styling
    -   Flux UI components
-   **Database**: MongoDB (easily configurable to other databases)
-   **Authentication**: Built-in Laravel authentication

## 🚀 Getting Started

### Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js & NPM

### Installation

1. Clone the repository

```
git clone https://github.com/must01/fuji.git
cd fuji
```

2. Install PHP dependencies

```
composer install
```

3. Install NPM dependencies

```
npm install
```

4. Create environment file

```
cp .env.example .env
```

5. Generate application key

```
php artisan key:generate
```

6. Set up the database

```
php artisan migrate
```

7. Start the development server

```
php artisan serve
```

8. In a separate terminal, start the Vite development server

```
npm run dev
```

## 🎯 Usage

1. Register a new account or login to your existing account
2. Create new notes with **custom colors**, **themes**, and **tags**
3. Format notes with **HTML content** and use the **bold button**
4. View, edit, or delete your notes
5. Filter notes by tags
6. **Search notes** using the search bar by name, content, or tags
7. Toggle between light and dark mode

## 🎨 Customization

The application uses TailwindCSS for styling. You can customize the appearance by modifying:

-   `resources/css/app.css` for custom utilities and theme overrides
-   Color themes in the utility classes
-   Component layouts in the Blade templates

## 👤 Author

**Mustapha Bouddahr**

-   Portfolio: [mustaphabouddahr.netlify.app](https://mustaphabouddahr.netlify.app)
-   Github: [@must01](https://github.com/must01)

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

<div align="center">
Made with ❤️ by Mustapha Bouddahr
</div>
