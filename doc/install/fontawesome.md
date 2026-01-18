# Documentation — Font Awesome 6 (Stone Starter)

🎯 Objectif

Intégrer Font Awesome 6 dans Stone Starter :

Via npm (@fortawesome/fontawesome-free)

Compatible Tailwind CSS + Blade

Pas de CDN, tout en local

Webfonts + CSS inclus pour production

Facile à utiliser dans Blade

## 📁 Arborescence

php-starter/
├─ public/
│  └─ assets/
│     └─ fontawesome/
│        ├─ css/
│        │  └─ all.min.css
│        └─ webfonts/
│           ├─ fa-solid-900.woff2
│           └─ ...

⚙️ Installation
1️⃣ Installer via npm
npm install @fortawesome/fontawesome-free

2️⃣ Copier fichiers nécessaires
mkdir -p public/assets/fontawesome
cp -r node_modules/@fortawesome/fontawesome-free/css public/assets/fontawesome/
cp -r node_modules/@fortawesome/fontawesome-free/webfonts public/assets/fontawesome/

📜 Inclusion dans Blade
Views/layouts/app.blade.php
<!-- Font Awesome
<link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
-->
<!-- Tailwind
<link rel="stylesheet" href="/assets/app.css">
-->
<!-- JS
<script src="/assets/gsap.js" defer></script>
<script src="/assets/app.js" defer></script>

-->

✅ Ordre recommandé : Font Awesome avant Tailwind pour pouvoir utiliser les classes Tailwind sur les icônes.

🧩 Utilisation dans Blade
<!-- Solid icon
<i class="fas fa-home text-indigo-600 w-6 h-6"></i>
-->
<!-- Regular icon
<i class="far fa-user text-gray-700 w-5 h-5"></i>
-->
<!-- Brand icon
<i class="fab fa-github text-gray-800 w-5 h-5"></i>
-->
Tu peux combiner Tailwind classes (text-color, w-6, h-6) avec les icônes Font Awesome.

✅ Bonnes pratiques

Copier CSS + webfonts localement pour contrôle total

Inclure dans Blade avant Tailwind

Utiliser Tailwind pour la couleur, taille, marges

Éviter le CDN pour production

Peut être utilisé partout : navbar, boutons, cards, menus…
