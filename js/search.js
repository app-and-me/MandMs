var audioPlayer = null; // 전역 변수로 Audio 객체 선언

function playAudio(music_path) {
    if (audioPlayer) {
        audioPlayer.pause(); // 이미 재생 중인 경우 일시 정지
    }
    audioPlayer = new Audio(music_path);
    audioPlayer.load();
    audioPlayer.play();
}

function pauseAudio(music_path) {
    if (audioPlayer) {
        audioPlayer.pause();
        audioPlayer.currentTime = 0;
    }
}

// 나머지 코드는 동일하게 유지




window.onload = function() {
    searchAllMusic();
}

function searchMusic() {
    var searchQuery = document.getElementById('searchQuery').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('result_section').innerHTML = this.responseText;
            addWriteLinkEventListeners(); // write 링크에 이벤트 리스너 추가
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
            document.getElementById('result_section').innerHTML = this.responseText;
            addWriteLinkEventListeners(); // write 링크에 이벤트 리스너 추가
        }
    };
    xhttp.open("GET", "searchAll.php", true);
    xhttp.send();
}

function addWriteLinkEventListeners() {
    const writeLinks = document.querySelectorAll(".write");
    writeLinks.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            const musicId = link.getAttribute("data-music-id");
            openWritePage(musicId);
        });
    });
}
