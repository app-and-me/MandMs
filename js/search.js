const play = document.querySelector(".play");
const pause = document.querySelector(".pause");
const audio = document.querySelectorAll("audio");

play.addEventListener("click", e => {
    pause.click();
    e.currentTarget.closest("article").querySelector("audio").play();
});

pause.addEventListener("click", e => {
    e.currentTarget.closest("article").querySelector("audio").pause();
    e.currentTarget.closest("article").querySelector("audio").currentTime = 0;
});


function searchMusic() {
    // 입력 필드에서 검색어 가져오기
    var searchQuery = document.getElementById('searchQuery').value;

    // search.php 파일에 AJAX 요청 보내기
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // 결과 섹션을 서버 응답으로 업데이트하기
            document.getElementById('result_section').innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "search.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("searchQuery=" + searchQuery);
}


