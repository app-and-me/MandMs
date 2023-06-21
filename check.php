<?php
// connect.php 파일을 그대로 가져옵니다.
include_once("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 제목과 내용 가져오기
    $title = $_POST['write_title'];
    $emotion = isset($_POST['emotion']) ? $_POST['emotion'] : ''; // 감정 값이 존재하지 않을 경우 빈 문자열로 설정
    $content = $_POST['write_content'];
    $music_id = $_POST['music_id'];
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

    // 사용자가 작성한 게시물을 데이터베이스에 삽입하는 SQL 쿼리
    $sql = "INSERT INTO articles (title, emotion, content, music_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $title, $emotion, $content, $music_id);
    if ($stmt->execute() === TRUE) {
        echo "게시물이 성공적으로 작성되었습니다.";
    } else {
        echo "게시물 작성 중 오류가 발생했습니다: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "잘못된 요청입니다.";
}
?>
