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

function searchAllMusic() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('result_section').innerHTML = this.responseText;
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
        }
    };
    xhttp.open("POST", "search.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("searchQuery=" + searchQuery);
}

function writeId(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "write.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // 전송이 성공했을 때 write.html로 화면 전환
            window.location.href = "write.html";
        }
    };
    xhr.send("id=" + id);
}
