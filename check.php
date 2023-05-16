<?php
    //connect.php파일을 그대로 가져온다.
    include_once("connect.php");

    $title = $_POST["title"];
    $music = $_POST["music"];
    $emotion = $_POST["emotion"];
    $content = $_POST["content"];

    if ($_SERVER["post"] == "POST") {
        // 제목과 내용 가져오기
        $title = $_POST['title'];
        $emotion = $_POST['emotion'];
        $music = $_POST['music'];
        $content = $_POST['content'];

        // 제목과 내용을 데이터베이스에 삽입하기
        $sql = "INSERT INTO post (title, emotion, music, content) VALUES ('$title', '$emotion', '$music', '$content')";

        if ($conn->query($sql) === TRUE) {
            echo "글이 성공적으로 업로드되었습니다.";
        } else {
            echo "글 업로드 오류: " . $conn->error;
        }
    }
?>
