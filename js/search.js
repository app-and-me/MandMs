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

// 페이지 로드 시 모든 노래 정보 가져오기
window.onload = function() {
    searchAllMusic();
}

function searchMusic() {
    var searchQuery = document.getElementById('searchQuery').value;
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

function searchAllMusic() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // 결과 섹션을 서버 응답으로 업데이트하기
            document.getElementById('result_section').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "searchAll.php", true);
    xhttp.send();
}




