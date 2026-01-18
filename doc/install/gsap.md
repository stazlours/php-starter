# Documentation — GSAP (Stone Starter)

🎯 Objectif

Intégrer GSAP dans Stone Starter :

Sans bundler (ni Vite, ni Webpack)

Compatible PHP + Blade-like

Chargement global simple

Animations UI modernes

Facile à maintenir et étendre

## 📁 Arborescence concernée

php-starter/
├─ public/
│  └─ assets/
│     ├─ gsap.js      # GSAP minifié (copié depuis node_modules)
│     ├─ app.js       # JS principal du projet
│     └─ app.css

## ⚙️ Installation

npm install gsap

Copie du build navigateur :

cp ./node_modules/gsap/dist/gsap.min.js ./public/assets/gsap.js

(optionnellement automatisé via script npm)

## 📜 Fichier JS principal

public/assets/app.js
document.addEventListener("DOMContentLoaded", () => {
    if (typeof gsap === "undefined") {
        console.warn("GSAP not loaded");
        return;
    }

    gsap.from("[data-animate='fade']", {
        opacity: 0,
        y: 20,
        duration: 0.6,
        ease: "power2.out"
    });
});

🧩 Intégration dans le layout Blade
Views/layouts/app.blade.php
<!--
<link rel="stylesheet" href="/assets/app.css">

<script src="/assets/gsap.js" defer></script>
<script src="/assets/app.js" defer></script>

-->

### ⚠️ GSAP doit être chargé avant app.js

🧪 Utilisation dans une vue
<div
    data-animate="fade"
    class="bg-white p-6 rounded-xl shadow"
>
    Animation GSAP active 🚀
</div>

✅ Bonnes pratiques

✔ Utiliser data-animate pour déclencher les animations
✔ Centraliser les animations dans app.js
❌ Ne pas utiliser import JS côté navigateur
❌ Ne pas charger GSAP via CDN

## 🔮 Évolutions possibles

Fichiers JS par page

Animations GSAP conditionnelles

Menu mobile animé

Dark mode animé
