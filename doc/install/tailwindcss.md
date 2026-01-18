# Documentation — Tailwind CSS 3.4 (Stone Starter)

🎯 Objectif

Intégrer Tailwind CSS 3.4 en local dans Stone Starter :

Sans CDN

Sans framework JS

Compatible PHP + Blade-like

Build moderne (dev / prod)

Extensible et maintenable

## php-starter/

├─ resources/
│  └─ css/
│     └─ app.css          # Source Tailwind
│
├─ public/
│  └─ assets/
│     └─ app.css          # CSS compilé (auto-généré)
│
├─ Views/
│  └─ layouts/
│     └─ app.blade.php    # Layout principal
│
├─ tailwind.config.js
├─ postcss.config.js
├─ package.json

## ⚙️ Installation

npm init -y
npm install -D tailwindcss@3.4 postcss autoprefixer
npx tailwindcss init

## ⚙️ Configuration Tailwind

tailwind.config.js

module.exports = {
  content: [
    "./Views/**/*.php",
    "./Views/**/*.blade.php",
    "./app/**/*.php",
    "./resources/**/*.css"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

## 🎨 CSS source

resources/css/app.css

@tailwind base;
@tailwind components;
@tailwind utilities;

🧪 Scripts NPM
package.json
{
  "scripts": {
    "dev": "tailwindcss -i ./resources/css/app.css -o ./public/assets/app.css --watch",
    "build": "tailwindcss -i ./resources/css/app.css -o ./public/assets/app.css --minify"
  }
}

## ▶️ Utilisation

Mode développement
npm run dev

Mode production
npm run build
