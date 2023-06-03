const frame = document.querySelector("section");
const lists  = frame.querySelectorAll("article");
const deg = 120;
const len = lists.length-1;
const btnLeft = document.querySelector(".btnLeft");
const btnRight = document.querySelector(".btnRight");

let i = 0;
let frameNumber = 0;
let num = 0;

for (let element of lists){
    element.style.transform = `rotate(${deg*i}deg) translateY(-100vh)`;
    i++;
}

btnLeft.addEventListener("click", ()=>{
    num++;
    if(num == Number.MAX_SAFE_INTEGER) num = 0;
    frame.style.transform = `rotate(${deg * num}deg)`;
});

btnRight.addEventListener("click", ()=>{
    num--;
    if(num == Number.MIN_SAFE_INTEGER) num = 0;
    frame.style.transform = `rotate(${deg * num}deg)`;
});