import { gsap } from "gsap"

export function homeAnimations() {
  gsap.from(".card", {
    opacity: 0,
    y: 30,
    duration: 0.8,
    stagger: 0.15,
    ease: "power3.out"
  })
}
