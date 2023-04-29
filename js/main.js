const frame = document.querySelector("section");
const lists  = frame.querySelectorAll("article");
const deg = 90;
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


// TODO : 회전 했을 때 아티클이 중앙에 배치되지 않는 오류 고치기
btnLeft.addEventListener("click", ()=>{
    num++;
    frame.style.transform = `rotate(${deg * num}deg)`;
});

btnRight.addEventListener("click", ()=>{
    num--;
    frame.style.transform = `rotate(${deg * num}deg)`;
});