<?php
// MySQL 서버 연결 정보
$servername = "localhost"; // 서버 이름
$username = "root"; // 사용자 이름
$password = "1234"; // 비밀번호
$dbname = "mandmz"; // 데이터베이스 이름

// MySQL 서버에 연결
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("MySQL 서버 연결 실패: " . $conn->connect_error);
}

// 데이터베이스 삭제 쿼리
$sql_drop_db = "DROP DATABASE IF EXISTS `$dbname`";
if ($conn->query($sql_drop_db) === TRUE) {
    echo "데이터베이스 삭제 완료";
} else {
    echo "데이터베이스 삭제 실패: " . $conn->error;
}

// 데이터베이스 생성 쿼리
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$dbname`";
if ($conn->query($sql_create_db) === TRUE) {
    echo "데이터베이스 생성 완료";
} else {
    echo "데이터베이스 생성 실패: " . $conn->error;
}

// 데이터베이스 선택
$conn->select_db($dbname);

// 다이어리 테이블 생성 쿼리
$sql_create_table = "CREATE TABLE IF NOT EXISTS information (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    music VARCHAR(255),
    emotion INT
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "다이어리 테이블 생성 완료";
} else {
    echo "다이어리 테이블 생성 실패: " . $conn->error;
}

// 음악 테이블 생성 쿼리
$sql_create_music_table = "CREATE TABLE IF NOT EXISTS music (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    album MEDIUMBLOB NOT NULL,
    file_path VARCHAR(200) NOT NULL,
    count INT
)";

if ($conn->query($sql_create_music_table) === TRUE) {
    echo "음악 테이블 생성 완료";
} else {
    echo "음악 테이블 생성 실패: " . $conn->error;
}


// 데이터 삽입 쿼리
$sql_insert_music = "INSERT INTO music (title, artist, album, file_path)
VALUES ('1 of 1', '김선희', '" . $conn->real_escape_string(file_get_contents("img/1of1.jpg")) . "', 'music/1 of 1.mp3'),
       ('love', '이선희', '" . $conn->real_escape_string(file_get_contents("img/love.jpg")) . "', 'music/love.mp3')";


if ($conn->query($sql_insert_music) === TRUE) {
    echo "데이터 삽입 완료";
} else {
    echo "데이터 삽입 실패: " . $conn->error;
}


// MySQL 서버 연결 종료
$conn->close();
?>
