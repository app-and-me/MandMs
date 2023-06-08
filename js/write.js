const body = document.querySelector("body");
const audio = document.querySelector("audio");
const emojiButtons = document.querySelectorAll(".emoji_button");

function setBackground(){
    let num = Math.floor(Math.random() * 5 + 1);
    console.log(num);
    body.style.backgroundImage = `url(img/article_bg/articlebg${num}.svg)`;
}

for(let e of emojiButtons){
    e.addEventListener("click", () => {
        for(let btn of emojiButtons){
            btn.style.opacity = 0.5;
        }
        e.style.opacity = 1;
    });
}
