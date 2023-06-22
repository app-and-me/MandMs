function showAllPost() {
    var emojiSelect = document.getElementById('emoji_select');
    var selectedValue = emojiSelect.value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);

            var bottomWrapper = document.getElementById('bottom_wrapper');
            bottomWrapper.innerHTML = "";

            if (response.posts && response.posts.length > 0) {
                // 필터링된 게시물을 표시
                var posts = response.posts;
                for (var i = 0; i < posts.length; i++) {
                    var post = posts[i];
                    var postElement = document.createElement('div');
                    postElement.className = "post";
                    postElement.innerHTML = `
                        <div class="image">
                            <img src="${post.image}" alt="">
                        </div>
                        <div class="span_wrapper">
                            <span class="title">${post.title}</span>
                            <span class="song"></span>
                        </div>
                    `;
                    postElement.setAttribute('data-id', post.id);  // 게시물 ID 저장
                    postElement.addEventListener('click', function() {
                        postId(this.getAttribute('data-id'));  // 해당 게시물의 ID 전달
                    });
                    bottomWrapper.appendChild(postElement);
                }
            } else {
                // 게시글이 없는 경우 메시지 표시
                var message = response.message;
                var messageElement = document.createElement('span');
                messageElement.textContent = message;
                bottomWrapper.appendChild(messageElement);
            }
        }
    };
    xhttp.open("GET", `showAllpost.php?emotion=${selectedValue}`, true);
    xhttp.send();
}

// emoji_select 값이 변경되면 showAllPost 함수 호출
document.getElementById('emoji_select').addEventListener('change', showAllPost);

// 페이지 로드 시 초기 데이터 표시
window.addEventListener('load', showAllPost);

function postId(id) {
    window.location.href = 'postview.html?id=' + id;
}
