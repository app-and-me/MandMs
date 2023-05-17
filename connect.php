<?php
    // MySQL 데이터베이스 연결 정보
    $servername = "localhost";  // MySQL 서버 주소
    $username = "root";    // MySQL 사용자 이름
    $password = "0000";    // MySQL 비밀번호
    $dbname = "m&mz";  // 사용할 데이터베이스 이름

    // MySQL 데이터베이스에 연결
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("MySQL 연결 실패: " . $conn->connect_error);
    }

    // 연결 성공 메시지 출력
    echo "MySQL 연결 성공";
?>