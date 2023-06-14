<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_POST['image'];
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $audio = $_POST['audio'];

    // 동적으로 추가할 HTML 코드 생성
    $musicwrite = '
    <div class="musicInfo">
        <div id="musicCover">
            <img id="image" src="' . $image . '" alt="">
        </div>
        <span id="musicTitle">' . $title . ' - ' . $artist . '</span>
    </div>
    <section>
        <input type="text" placeholder="제목을 입력하시오" id="title" name="title"/>
        <div class="emoji_radio">
            <label for="emoji1">
                <input type="radio" id="emoji1" name="emoji" value="1">
                <img src="img/emoji1.svg" alt="">
            </label>
            <label for="emoji2">
                <input type="radio" id="emoji2" name="emoji" value="2">
                <img src="img/emoji2.svg" alt="">
            </label>
            <label for="emoji3">
                <input type="radio" id="emoji3" name="emoji" value="3">
                <img src="img/emoji3.svg" alt="">
            </label>
            <label for="emoji4">
                <input type="radio" id="emoji4" name="emoji" value="4">
                <img src="img/emoji4.svg" alt="">
            </label>
            <label for="emoji5">
                <input type="radio" id="emoji5" name="emoji" value="5">
                <img src="img/emoji5.svg" alt="">
            </label>
        </div>
        <input type="hidden" id="emotion" name="emotion" value="">
    </section>
    <input type="text" placeholder="text" id="text" name="text"/>
    <button id="end">끝내기</button>
    <!-- 음악 재생 -->
    <audio src="' . $audio . '" autoplay loop></audio>';

    // 동적으로 추가할 HTML 코드 반환
    echo $musicwrite;
}
?>
