<?php
if (isset($_POST['write_title']) && isset($_POST['write_content']) && isset($_POST['emotion']) && isset($_POST['id'])) {
    $write_title = $_POST['write_title'];
    $write_content = $_POST['write_content'];
    $emotion = $_POST['emotion'];
    $id = $_POST['id'];

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

    // id를 기반으로 음악 데이터를 가져오는 SQL 쿼리
    $sql = "SELECT album, title, artist, file_path FROM music WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // 검색된 데이터를 가져와서 사용
        $row = $result->fetch_assoc();
        $music_title = $row['title'];
        $artist = $row['artist'];
        $image = $row['album'];
        $audio = $row['file_path'];

        // 데이터베이스에 데이터 삽입
        $sql_insert_data = "INSERT INTO information (title, content, music_title, artist, album, file_path, emotion) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert_data);
        $stmt_insert->bind_param("ssssbss", $write_title, $write_content, $music_title, $artist, $image, $audio, $emotion);
        if ($stmt_insert->execute()) {
            $inserted_id = $stmt_insert->insert_id;
            echo $inserted_id; // 저장된 열의 ID를 반환합니다.
        } else {
            echo "데이터 저장 실패: " . $stmt_insert->error;
        }
    } else {
        echo "해당 ID의 음악 데이터를 찾을 수 없습니다.";
    }
} else {
    echo "write_title, write_content, emotion, id 데이터가 올바르게 전송되지 않았습니다.";
}
?>
