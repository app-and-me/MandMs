<?php
// connect.php 파일을 그대로 가져옵니다.
include_once("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 제목과 내용 가져오기
    $title = $_POST['title'];
    $emotion = isset($_POST['emotion']) ? $_POST['emotion'] : ''; // 감정 값이 존재하지 않을 경우 빈 문자열로 설정
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
    $sql = "INSERT INTO information (title, emotion, content) VALUES ('$title', '$emotion', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "글이 성공적으로 업로드되었습니다.";
        // 글이 성공적으로 업로드되었을 때, postview.html 페이지로 리다이렉트
        header("Location: postview.html");
        exit(); // 리다이렉트 후에 코드 실행 중단
    } else {
        echo "글 업로드 오류: " . $conn->error;
    }


    // MySQL 서버 연결 종료
    $conn->close();
}
?>
