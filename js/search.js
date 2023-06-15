const play = document.querySelectorAll(".play");
const pause = document.querySelectorAll(".pause");
const audio = document.querySelectorAll("audio");

function playAudio(element) {
    var audio = element.parentNode.nextElementSibling;
    audio.play();
}

function pauseAudio(element) {
    var audio = element.parentNode.nextElementSibling;
    audio.pause();
}


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
