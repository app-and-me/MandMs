const frame = document.querySelector("section");
const lists = frame.querySelectorAll("article");
const deg = 120;
const len = lists.length - 1;

const btnLeft = document.querySelector(".btnLeft");
const btnRight = document.querySelector(".btnRight");

const btnMusic = document.querySelector("#music");
const btnSearch = document.querySelector("#search");
const btnList = document.querySelector("#list");

const searchBar = document.querySelector("#search_bar");
const searchPage = "search.html";

const play = document.querySelector("#play");

let i = 0;
let frameNumber = 0;
let num = 0;

for (let element of lists) {
  element.style.transform = `rotate(${deg * i}deg) translateY(-100vh)`;
  i++;
}

btnLeft.addEventListener("click", () => {
  num++;
  if (num === Number.MAX_SAFE_INTEGER) num = 0;
  frame.style.transform = `rotate(${deg * num}deg)`;
});

btnRight.addEventListener("click", () => {
  num--;
  if (num === Number.MIN_SAFE_INTEGER) num = 0;
  frame.style.transform = `rotate(${deg * num}deg)`;
});

btnMusic.addEventListener("click", () => {
  num = 0;
  frame.style.transform = `rotate(${deg * num}deg)`;
  btnMusic.style.fontWeight = `800`;
  btnSearch.style.fontWeight = `400`;
  btnList.style.fontWeight = `400`;
});

btnSearch.addEventListener("click", () => {
  if (num % 3 === 0) num = -1;
  else num++;
  frame.style.transform = `rotate(${deg * num}deg)`;
  btnMusic.style.fontWeight = `400`;
  btnSearch.style.fontWeight = '800';
  btnList.style.fontWeight = `400`;
});

btnList.addEventListener("click", () => {
  if (num % 3 === 0) num = 1;
  else num--;
  frame.style.transform = `rotate(${deg * num}deg)`;
  btnMusic.style.fontWeight = `400`;
  btnSearch.style.fontWeight = `400`;
  btnList.style.fontWeight = `800`;
});

searchBar.addEventListener("click", () => {
  window.open(searchPage);
});

// 오디오 재생이 끝나면 다음 트랙으로 변경
let audioList = [];
let audioIndex = 0;
let audio = document.querySelector("audio");

function setAudioList() {
  audioList.push("music/1 of 1.mp3");
  audioList.push("music/sugar.mp3");
  
}

setAudioList();

audio.addEventListener("ended", () => {
  console.log("곡 끝남");
  if (audioIndex > audioList.length - 1) audioIndex = 0;
  audio.src = audioList[audioIndex++];

  audio.play();
});
