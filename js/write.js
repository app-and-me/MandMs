const body = document.querySelector("body");
const audio = document.querySelector("audio");
const labels = document.querySelectorAll("label");

for (let i in labels) {
    labels[i].addEventListener("click", () => {
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
document.getElementById("end").onclick = function () {
    var selectedEmoji = document.querySelector('input[name="emoji"]:checked');
    if (selectedEmoji) {
        // 선택된 라디오 버튼의 값을 가져와서 $_POST['emotion']에 할당
        document.getElementById("emotion").value = selectedEmoji.value;
        document.querySelector("form").submit(); // 폼 제출
    } else {
        alert("감정을 선택해주세요.");
    }
};

// Ajax 요청을 통해 동적으로 추가되는 HTML 코드를 받아서 추가하는 함수
function addMusicElement(response) {
    const wrap = document.querySelector(".wrap");
    wrap.innerHTML = response;
}

// 페이지 로드 시 초기 설정
setBackground();

// 가져온 값을 write.php로 전달하는 Ajax 요청
function sendMusicData(image, title, artist, audio) {
    // 전달할 데이터 생성
    const data = {
        image: image,
        title: title,
        artist: artist,
        audio: audio,
    };

    // Ajax 요청
    $.ajax({
        url: 'write.php',
        type: 'POST',
        data: data,
        success: function (response) {
            // 요청이 성공하면 동적으로 HTML 코드를 추가
            $('article.wrap').html(response);
        },
        error: function (xhr, status, error) {
            // 요청이 실패한 경우 에러 처리
            console.error(error);
        }
    });
}

// 페이지 로드 시 초기 설정
$(document).ready(function() {
    setBackground();
});


