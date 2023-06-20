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

// 'id'라는 매개변수를 받아서 'id'값을 write.html로 전달하고 페이지 이동
function writeId(id) {
    window.location.href = 'write.html?id=' + id;
  }
  





