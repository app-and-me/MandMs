<?php
// 양식 데이터 가져오기
$title = $_POST['title'];
$text = $_POST['text'];

// 입력값 유효성 검사 및 필터링 (선택적이지만 권장됨)
$title = htmlspecialchars($title);
$text = htmlspecialchars($text);

// 데이터베이스에 연결하기
$servername = "localhost";  // 여기에 서버 이름을 입력하세요
$username = "root";  // 여기에 데이터베이스 사용자 이름을 입력하세요
$password = "0000";  // 여기에 데이터베이스 비밀번호를 입력하세요
$dbname = "posts";  // 여기에 데이터베이스 이름을 입력하세요

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
}

// SQL 쿼리 준비 및 실행
$stmt = $conn->prepare("INSERT INTO posts (title, text) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $text);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "데이터가 성공적으로 삽입되었습니다!";
} else {
    echo "데이터 삽입 중 오류가 발생했습니다.";
}

// 데이터베이스 연결 종료
$stmt->close();
$conn->close();
?>
