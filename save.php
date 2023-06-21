<?php
if (isset($_POST['write_title']) && isset($_POST['write_content']) && isset($_POST['emotion'])) {
    $write_title = $_POST['write_title'];
    $write_content = $_POST['write_content'];
    $emotion = $_POST['emotion'];

    // MySQL 서버 연결 정보
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "mandmz";

    // MySQL 서버에 연결
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("MySQL 서버 연결 실패: " . $conn->connect_error);
    }

    // 데이터베이스에 데이터 삽입
    $sql_insert_data = "INSERT INTO information (title, content, emotion) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert_data);
    $stmt_insert->bind_param("sss", $write_title, $write_content, $emotion);
    if ($stmt_insert->execute()) {
        $inserted_id = $stmt_insert->insert_id;
        echo $inserted_id; // 저장된 열의 ID를 반환합니다.
    } else {
        echo "데이터 저장 실패: " . $stmt_insert->error;
    }
} else {
    echo "write_title, write_content, emotion 데이터가 올바르게 전송되지 않았습니다.";
}

?>