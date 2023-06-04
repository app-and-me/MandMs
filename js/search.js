const play = document.querySelector(".play");
const audio = document.querySelectorAll("audio");

play.addEventListener("click", e => {
    e.currentTarget.closest("article").querySelector("audio").play();
})
