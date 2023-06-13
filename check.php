<?php
// connect.php 파일을 그대로 가져옵니다.
include_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 제목과 내용 가져오기
    $title = $_POST['title'];
    $emotion = $_POST['emotion'];
    $music = $_POST['music'];
    $content = $_POST['text'];

    // MySQL 서버 연결 정보
    $servername = "localhost"; // 서버 이름
    $username = "root"; // 사용자 이름
    $password = "1234"; // 비밀번호
    $dbname = "mandmz"; // 데이터베이스 이름

    // MySQL 서버에 연결
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("MySQL 서버 연결 실패: " . $conn->connect_error);
    }

    // 데이터 삽입 쿼리
    $sql = "INSERT INTO information (title, emotion, music, content) VALUES ('$title', '$emotion', '$music', '$content')";

    if ($conn->query($sql) === TRUE) {
        // 글이 성공적으로 업로드되었을 때, index.html의 write_result 화면으로 리다이렉트
        header("Location: index.html#write_result");
        exit(); // 리다이렉트 후에 코드 실행 중단
    } else {
        echo "글 업로드 오류: " . $conn->error;
    }    
    

    // MySQL 서버 연결 종료
    $conn->close();
}
?>
