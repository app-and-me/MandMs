<?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "0000";
$dbname = "posts";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 사용자로부터 입력받은 데이터
$title = $_POST['title'];
$content = $_POST['content'];

// SQL INSERT 문 실행
$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
if ($conn->query($sql) === TRUE) {
    echo "데이터가 성공적으로 삽입되었습니다.";
} else {
    echo "오류: " . $sql . "<br>" . $conn->error;
}

// 데이터베이스 연결 종료
$conn->close();
?>
