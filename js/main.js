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
  audioList.push("music/가인, 조권 - 우리 사랑하게 됐어요 [가사 Lyrics].mp3");
  audioList.push("music/나는 나비 (A Flying Butterfly).mp3");
  audioList.push("music/내 자존감에 시동 걸어주는 노래   Katy Perry (케이티 페리) - Roar (가사 해석 lyrics).mp3");
  audioList.push("music/러브홀릭스(Loveholics) - Butterfly [국가대표 OST] [가사 Lyrics].mp3");
  audioList.push("music/리쌍(LeeSSang) - 헤어지지 못하는 여자, 떠나가지 못하는 남자 (Feat. 정인) [가사 Lyrics].mp3");
  audioList.push("music/마로니에 칵테일사랑 (가사 첨부).mp3");
  audioList.push("music/버즈(Buzz) - 가시 [가사 Lyrics].mp3");
  audioList.push("music/붉은 노을 (Sunset Glow).mp3");
  audioList.push("music/씨엔블루 (CNBLUE) - 외톨이야.mp3");
  audioList.push("music/여자친구 (ヨジャチング)－「유리구슬 GLASS BEAD」LYRICS 가사 한국어.mp3");
  audioList.push("music/전 세계인의 동심을 파괴한 노래  Aqua - Barbie Girl [가사 번역].mp3");
  audioList.push("music/체리필터 - 오리날다 [가사 Lyrics].mp3");
  audioList.push("music/체리필터(cherryfilter) - 낭만고양이 [가사 Lyrics].mp3");
  audioList.push("music/최예나 스마일리 가사 YENA SMILEY Lyrics (feat. 비비 BIBI)   Color Coded   Han Rom Eng.mp3");
  audioList.push("music/코요태 - 우리의 꿈 가사 (Lyrics).mp3");
  audioList.push("music/After LIKE.mp3");
  audioList.push("music/BLACKPINK - 마지막처럼.mp3");
  audioList.push("music/Britney Spears - Toxic (Official HD Video).mp3");
  audioList.push("music/Coldplay - Viva La Vida (한글 가사 해석).mp3");
  audioList.push("music/double take.mp3");
  audioList.push("music/dreams come true.mp3");
  audioList.push("music/englishman in new york.mp3");
  audioList.push("music/firework.mp3");
  audioList.push("music/G-DRAGON(지드래곤) - 삐딱하게(Crooked) [가사 Lyrics].mp3");
  audioList.push("music/GFRIEND(여자친구) - NAVILLERA(너 그리고 나) Color Coded Lyrics   [Han Rom Eng].mp3");
  audioList.push("music/Girls’ Generation (소녀시대) (SNSD) – All Night Lyrics (Han Rom Eng Color Coded).mp3");
  audioList.push("music/high hopes.mp3");
  audioList.push("music/Highlight(하이라이트) _ Plz Don’t Be Sad(얼굴 찌푸리지 말아요).mp3");
  audioList.push("music/hype boy.mp3");
  audioList.push("music/JEON SOMI XOXO Lyrics (전소미 XOXO 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/JEON SOYEON BEAM BEAM Lyrics (전소연 삠삠 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/Laboum  Imagine More 상상더하기 Fresh Adventure  Lyrics (Color Coded+Han+Rom+Eng).mp3");
  audioList.push("music/Lee Hyori (이효리) -  10 Minutes  Lyrics [Color Coded Han Rom Eng].mp3");
  audioList.push("music/love me rigth.mp3");
  audioList.push("music/love.mp3");
  audioList.push("music/MAKING A LOVER - 꽃보다 남자 OST.mp3");
  audioList.push("music/maps.mp3");
  audioList.push("music/Maroon 5 sugar 가사 영어 한국 번역.mp3");
  audioList.push("music/Married To The Music.mp3");
  audioList.push("music/Miss A (미쓰에이) - Bad Girl Good Girl   Color Coded Han Rom Eng Lyrics (가사).mp3");
  audioList.push("music/MUST HAVE LOVE.mp3");
  audioList.push("music/NCT DREAM 엔시티 드림 Beatbox (English Ver.) Lyric Video.mp3");
  audioList.push("music/NCT DREAM Candy Lyrics (엔시티 드림 Candy 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/NCT U 90s Love' Lyrics (Color Coded Lyrics).mp3");
  audioList.push("music/NewJeans (뉴진스) - Cookie Audio.mp3");
  audioList.push("music/NewJeans (뉴진스) - Ditto Audio.mp3");
  audioList.push("music/NewJeans Attention Lyrics (뉴진스 Attention 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/Nitpicking (잔소리 (with 2AM 슬옹)).mp3");
  audioList.push("music/nothin on you.mp3");
  audioList.push("music/omg.mp3");
  audioList.push("music/Park Myung Soo, IU - Leon Lyrics (박명수, 아이유 - 레옹 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/Pretty Woman (귀여운 여인) OST - Oh Pretty Woman (Lyrics 해석).mp3");
  audioList.push("music/Red Velvet Birthday Lyrics (레드벨벳 Birthday 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/SEVENTEEN [세븐틴] - Pretty U [예쁘다] (Color Coded Lyrics   Han Rom Eng).mp3");
  audioList.push("music/SEVENTEEN [세븐틴] - Very NICE [아주 NICE] (Color Coded Lyrics   Han Rom Eng).mp3");
  audioList.push("music/SOMI (전소미) – BIRTHDAY (Han Rom Eng) Color Coded Lyrics 한국어 가사.mp3");
  audioList.push("music/SOMI (전소미) What You Waiting For lyrics (Color Coded Lyrics Eng Rom Han 가사).mp3");
  audioList.push("music/SOMI DUMB DUMB Lyrics (전소미 DUMB DUMB 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/STAYC ASAP Lyrics (스테이씨 ASAP 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/STAYC STEREOTYPE Lyrics (스테이씨 색안경 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/STAYC Teddy Bear Lyrics (스테이씨 Teddy Bear 가사) (Color Coded Lyrics).mp3");
  audioList.push("music/TAEYEON Weekend Lyrics (태연 Weekend 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/TWICE Talk that Talk Lyrics (트와이스 Talk that Talk 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/TXT - CROWN (어느날 머리에서 뿔이 자랐다) (Color Coded Lyrics Eng Rom Han 가사).mp3");
  audioList.push("music/TXT Blue Hour Lyrics (투모로우바이투게더 5시 53분의 하늘에서 발견한 너와 나 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/TXT Run Away Lyrics (투모로우바이투게더 9와 4분의 3 승강장에서 너를 기다려 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/Weeekly - After School Lyrics (위클리 - After School 가사) [Color Coded Han Rom Eng].mp3");
  audioList.push("music/Wonder Girls – Tell Me Lyrics [HAN ROM ENG].mp3");
  audioList.push("music/Y (Please Tell Me Why) - 프리스타일 가사(LYRICS) [오늘도 노래 한 곡].mp3");
  audioList.push("music/YENA SMARTPHONE Lyrics (최예나 스마트폰 가사) [Color Coded Lyrics Han Rom Eng].mp3");
  audioList.push("music/Younha (윤하) -  Password 486 (비밀번호 486)  Lyrics [Color Coded Han Rom Eng].mp3");


}

setAudioList();

audio.addEventListener("ended", () => {
  console.log("곡 끝남");
  if (audioIndex > audioList.length - 1) audioIndex = 0;
  audio.src = audioList[audioIndex++];

  audio.play();
});
