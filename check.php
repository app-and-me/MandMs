<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 제목과 내용 가져오기
    $write_title = $_POST['write_title'];
    $write_content = $_POST['write_text'];
    $emotion = $_POST['emotion'];
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

    // id를 기반으로 음악 데이터를 가져오는 SQL 쿼리
    $sql_select_music = "SELECT album, title, artist, file_path FROM music WHERE music_id = ?";
    $stmt_select_music = $conn->prepare($sql_select_music);
    $stmt_select_music->bind_param("i", $id);
    $stmt_select_music->execute();
    $result_music = $stmt_select_music->get_result();

    if ($result_music->num_rows > 0) {
        // 검색된 데이터를 가져와서 사용
        $row_music = $result_music->fetch_assoc();
        $music_title = $row_music['title'];
        $artist = $row_music['artist'];
        $image = $row_music['album'];
        $audio = $row_music['file_path'];

        // 데이터 삽입 쿼리
        $sql_insert_data = "INSERT INTO information (title, content, music_title, artist, album, file_path, emotion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert_data = $conn->prepare($sql_insert_data);
        $stmt_insert_data->bind_param("ssssssss", $write_title, $write_content, $music_title, $artist, $image, $audio, $emotion);

        if ($stmt_insert_data->execute()) {
            $inserted_id = $stmt_insert_data->insert_id;
            echo $inserted_id; // 저장된 열의 ID를 반환합니다.
            // 글이 성공적으로 업로드되었을 때, index.html의 write_result 화면으로 리다이렉트
            header("Location: postview.html");
            exit(); // 리다이렉트 후에 코드 실행 중단
        } else {
            echo "글 업로드 오류: " . $stmt_insert_data->error;
        }
    } else {
        echo "해당 ID의 음악 데이터를 찾을 수 없습니다.";
    }

    // MySQL 서버 연결 종료
    $conn->close();
} else {
    echo "요청 메서드가 올바르지 않습니다.";
}
?>
