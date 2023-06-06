const search = document.querySelector("#search");
const toggleMenu = document.querySelector(".search_toggle");

search.addEventListener("click", () => {
    toggleMenu.classList.toggle("active");
});