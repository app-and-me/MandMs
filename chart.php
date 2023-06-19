<?php
// DB 연결 설정
$servername = "localhost";  // 데이터베이스 서버 주소
$username = "root";     // 데이터베이스 사용자명
$password = "1234";     // 데이터베이스 비밀번호
$dbname = "mandmz";   // 데이터베이스명

// 데이터베이스 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 글 작성 시 COUNT 값 증가
if (isset($_POST['song'])) {
    $song = $_POST['song'];

    // 기존 COUNT 값 조회
    $query = "SELECT COUNT FROM songs WHERE song_title = '$song'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // COUNT 값 증가
        $count = $result->fetch_assoc()['COUNT'];
        $count++;
        
        // COUNT 값 업데이트
        $updateQuery = "UPDATE songs SET COUNT = $count WHERE song_title = '$song'";
        $conn->query($updateQuery);
    }
}

// 가장 많이 이용된 노래 5개 조회
$query = "SELECT song_title, COUNT FROM songs ORDER BY COUNT DESC LIMIT 5";
$result = $conn->query($query);
?>
