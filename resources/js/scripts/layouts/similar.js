document.addEventListener('DOMContentLoaded', (e) => {
  const categoriesItems = document.querySelector(".similar-categories");
  const categoriesBtn = document.querySelector(".similar__expand");
  categoriesBtn.addEventListener("click", () => {
    categoriesItems.classList.toggle("active");
    categoriesBtn.classList.toggle("active");
  });

  const regionsItems = document.querySelector(".similar-regions");
  const regionsBtn = document.querySelector(".regions__expand");
  regionsBtn.addEventListener("click", () => {
    regionsItems.classList.toggle("active");
    regionsBtn.classList.toggle("active");
  });
});

