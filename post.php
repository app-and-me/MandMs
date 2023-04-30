<?php
    // TODO : 데이터베이스 테이블 만들기.
    // 요소는 더 추가될 수 있음!
    $uTitle = $_POST["title"];
    $uEmotion = $_POST["Emotion"];
    $uMusic = $_POST["Music"];
    $uText = $_POST["Text"];

    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    // MySQL 데이터베이스에 연결.
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // 연결 오류 확인.
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // 연걸 성공.
    echo "Connected successfully";

?>