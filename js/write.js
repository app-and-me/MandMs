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

// 현재 URL에서 쿼리 파라미터를 가져오기
const urlParams = new URLSearchParams(window.location.search);

// "id" 쿼리 파라미터의 값 가져오기
const music_id = urlParams.get('id');



//글쓰기 클릭하면 write.html이동 그냥이동AJAX아님
//write.html에서 id값으로 write.php통해서 다른 데이터 비동기로 가져와서

function write_php(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('result_article').innerHTML = xhr.responseText;
            } else {
                console.log("write.php로 id를 보내는 데 실패했습니다.");
            }
        }
    };
    xhr.open("POST", "write.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "id=" + encodeURIComponent(id);
    xhr.send(data);
}

// write_php 함수 호출
write_php(music_id);

function saveData() {
    // 입력된 값 가져오기
    var write_title = document.getElementById("write_title").value;
    var write_content = document.getElementById("write_content").value;
    console.log(write_title, write_content)

    // 데이터 전송을 위한 AJAX 요청
$.ajax({
    type: "POST",
    url: "check.php",
    data: {
        write_title: write_title,
        write_content: write_content,
        music_id: music_id
    },
})
.done(function(response) {
    // AJAX 요청이 성공한 경우의 처리 코드
    console.log(response); // 서버에서 반환한 데이터 출력
})
.fail(function(xhr, status, error) {
    // AJAX 요청이 실패한 경우의 처리 코드
    console.log("AJAX 요청 실패");
    console.log(status + ": " + error);
});

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

