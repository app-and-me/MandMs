var audioPlayer = null; 

function playAudio(music_path) {
    if (audioPlayer) {
        audioPlayer.pause(); 
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

window.onload = function() {
    searchAllMusic();
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
