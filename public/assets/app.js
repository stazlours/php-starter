document.addEventListener("DOMContentLoaded", () => {
    if (typeof gsap === "undefined") {
        console.warn("GSAP not loaded");
        return;
    }

    // Animation globale de base
    gsap.from("[data-animate='fade']", {
        opacity: 0,
        y: 20,
        duration: 0.6,
        ease: "power2.out"
    });
});
