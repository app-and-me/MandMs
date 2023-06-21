function setBackground_post() {
    let num = Math.floor(Math.random() * 5 + 1);
    console.log(num);
    const body = document.querySelector("body");
    body.style.backgroundImage = `url(img/article_bg/articlebg${num}.svg)`;
}

// const prevPage = document.querySelector("#prev_page");
// prevPage.addEventListener("click", ()=>{
//     window.open("index.html", "_top");
// });


// 현재 URL에서 쿼리 파라미터를 가져오기
const urlParams = new URLSearchParams(window.location.search);

// "id" 쿼리 파라미터의 값 가져오기
const id = urlParams.get('id');

// id 값 사용하기
console.log("값 가져왔다 = "+id)

function postview_php(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('inner_content').innerHTML = xhr.responseText;
            } else {
                console.log("postview.php로 id를 보내는 데 실패했습니다.");
            }
        }
    };
    xhr.open("POST", "postview.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "id=" + encodeURIComponent(id);
    xhr.send(data);
}

postview_php(id);

function postId(id) {
    window.location.href = 'postview.html?id=' + id;
}