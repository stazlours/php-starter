import { gsap } from "gsap"

// Expose globalement si besoin
globalThis.window.gsap = gsap

// Animations globales
document.addEventListener("DOMContentLoaded", () => {
  gsap.from("[data-animate='fade']", {
    opacity: 0,
    y: 20,
    duration: 0.6,
    ease: "power2.out"
  })
})
