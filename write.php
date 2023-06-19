<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] ?? '' == "POST") {
    $id = $_POST['id'];

    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "mandmz";

    // 데이터베이스 연결
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("MySQL 서버 연결 실패: " . $conn->connect_error);
    }

    // id를 기반으로 음악 데이터를 가져오는 SQL 쿼리
    $sql = "SELECT image, title, artist, audio FROM music WHERE id = ?";

    // 쿼리를 실행하고 결과를 가져옴
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        // 검색된 데이터를 가져와서 사용
        $row = $result->fetch_assoc();
        $image = $row['image'];
        $title = $row['title'];
        $artist = $row['artist'];
        $audio = $row['audio'];

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
    } else {
        echo "해당 ID의 데이터를 찾을 수 없습니다.";
       
    }

    $stmt->close();
    $conn->close();
}
