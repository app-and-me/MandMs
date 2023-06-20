function setBackground_post() {
    let num = Math.floor(Math.random() * 5 + 1);
    console.log(num);
    const body = document.querySelector("body");
    body.style.backgroundImage = `url(img/article_bg/articlebg${num}.svg)`;
}

const prevPage = document.querySelector("#prev_page");
prevPage.addEventListener("click", ()=>{
    window.open("index.html", "_top");
});