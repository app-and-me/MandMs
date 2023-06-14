const body = document.querySelector("body");
const audio = document.querySelector("audio");
const labels = document.querySelectorAll("label");

for (let i = 0; i < labels.length; i++) {
  labels[i].addEventListener("click", () => {
    for (let j = 0; j < labels.length; j++) {
      labels[j].style.opacity = 0.6;
    }
    labels[i].style.opacity = 1;
  });
}

function setBackground() {
  let num = Math.floor(Math.random() * 5 + 1);
  console.log(num);
  body.style.backgroundImage = `url(img/article_bg/articlebg${num}.svg)`;
}

// "끝내기" 버튼 클릭 시 호출되는 함수
document.addEventListener("DOMContentLoaded", () => {
  const endButton = document.getElementById("end");
  if (endButton) {
    endButton.addEventListener("click", () => {
      var selectedEmoji = document.querySelector('input[name="emoji"]:checked');
      if (selectedEmoji) {
        // 선택된 라디오 버튼의 값을 가져와서 $_POST['emotion']에 할당
        document.getElementById("emotion").value = selectedEmoji.value;
        document.querySelector("form").submit(); // 폼 제출
      } else {
        alert("감정을 선택해주세요.");
      }
    });
  }
});

// Ajax 요청을 보내는 함수
function sendMusicData(image, title, artist, audio) {
  const formData = new FormData(); // 폼 데이터 객체 생성
  formData.append("image", image);
  formData.append("title", title);
  formData.append("artist", artist);
  formData.append("audio", audio);

  console.log("sendMusicData 함수 호출"); // 확인 메시지 출력

  fetch("write.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((response) => {
      addMusicElement(response); // 동적으로 HTML 코드 추가
    })
    .catch((error) => {
      console.error(error);
    });
}

function addMusicElement(html) {
  const resultArticle = document.getElementById("result_article");
  resultArticle.insertAdjacentHTML("beforeend", html);
  console.log("sendMusicElement 함수 호출");
}
