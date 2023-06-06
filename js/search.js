const play = document.querySelector(".play");
const pause = document.querySelector(".pause");
const audio = document.querySelectorAll("audio");

play.addEventListener("click", e => {
    pause.click();
    e.currentTarget.closest("article").querySelector("audio").play();
});

pause.addEventListener("click", e => {
    e.currentTarget.closest("article").querySelector("audio").pause();
    e.currentTarget.closest("article").querySelector("audio").currentTime = 0;
});
