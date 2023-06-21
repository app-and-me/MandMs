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
const id = urlParams.get('id');

function write_php(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('music_info').innerHTML = xhr.responseText;
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
write_php(id);

console.log("write.js에서 의 id다 = "+id)


// "끝내기" 버튼 클릭 시 호출되는 함수
document.getElementById("end").onclick = function() {
    var selectedEmoji = document.querySelector('input[name="emoji"]:checked');
    if (selectedEmoji) {
        // 선택된 라디오 버튼의 값을 가져와서 $_POST['emotion']에 할당
        document.getElementById("emotion").value = selectedEmoji.value;
        // id 값을 hidden input에 할당
        document.getElementById("idHiddenInput").value = id;
        // 폼 제출
        document.getElementById("writeForm").submit();
    } else {
        alert("감정을 선택해주세요.");
    }
};



