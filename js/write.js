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
write_php(id);

function saveData() {
    // 입력된 값 가져오기
    var write_title = document.getElementById("write_title").value;
    var write_content = document.getElementById("write_content").value;
    var emotion = document.getElementById("emotion").value;
    console.log(write_title, write_content, emotion)

    // 데이터 전송을 위한 AJAX 요청
    $.ajax({
        type: "POST",
        url: "save.php",
        data: {
            write_title: write_title,
            write_content: write_content,
            emotion: emotion,
            id: id
        },
        success: function(response) {
            alert(response); // 성공 또는 실패 메시지를 표시

            // postview.html로 리다이렉트하면서 ID 전달
            window.location.href = "postview.html?id=" + response;
        }
    });
}


