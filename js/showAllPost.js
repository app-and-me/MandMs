function showAllPost() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('bottom_wrapper').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "showAllpost.php", true);
    xhttp.send();
}

function postId(id) {
    window.location.href = 'postview.html?id=' + id;
}
