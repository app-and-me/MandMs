const body = document.querySelector("body");
const audio = document.querySelector("audio");


function setBackground(){
    let num = Math.floor(Math.random() * 5 + 1);
    console.log(num);
    body.style.backgroundImage = `url(img/article_bg/articlebg${num}.svg)`;
}