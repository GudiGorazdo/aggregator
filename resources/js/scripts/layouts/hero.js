document.addEventListener('DOMContentLoaded', (e) => {
  const heroText = document.querySelector(".hero-text-box");
  const heroTextBtn = document.querySelector(
    ".hero-text-expand-btn"
  );
  heroTextBtn.addEventListener("click", () => {
    heroText.classList.toggle("active");
    heroTextBtn.classList.toggle("active");
  });
});


