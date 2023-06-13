const body = document.querySelector("body");
const audio = document.querySelector("audio");
const labels = document.querySelectorAll("label");

for(let i in labels){
    labels[i].addEventListener("click", ()=>{
        labels[0].style.opacity = 0.6;
        labels[1].style.opacity = 0.6;
        labels[2].style.opacity = 0.6;
        labels[3].style.opacity = 0.6;
        labels[4].style.opacity = 0.6;
        labels[i].style.opacity = 1;
    });
}

function setBackground() {
    let num = Math.floor(Math.random() * 5 + 1);
    console.log(num);
    body.style.backgroundImage = `url(img/article_bg/articlebg${num}.svg)`;
}

// "끝내기" 버튼 클릭 시 호출되는 함수
document.getElementById("end").onclick = function() {
     var selectedEmoji = document.querySelector('input[name="emoji"]:checked');
    if (selectedEmoji) {
        // 선택된 라디오 버튼의 값을 가져와서 $_POST['emotion']에 할당
        document.getElementById("emotion").value = selectedEmoji.value;
        document.querySelector("form").submit(); // 폼 제출
    } else {
        alert("감정을 선택해주세요.");
    }
};

