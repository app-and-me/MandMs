function moveLeft(){
    var el = document.querySelector("figure");
    el.style.transition = "0.9s"
    el.style.transform = "translateX(-25vw)"
}

function moveRight(){
    var el = document.querySelector("figure");
    el.style.transition = "0.9s"
    el.style.transform = "translateX(25vw)"
}