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

    // 글 업로드 처리
    if ($_SERVER["post"] == "POST") {
        // 제목과 내용 가져오기
        $title = $_POST['title'];
        $emotion = $_POST['emotion'];
        $music = $_POST['music'];
        $content = $_POST['content'];

        // 제목과 내용을 데이터베이스에 삽입하기
        $sql = "INSERT INTO post (title, emotion, music, content) VALUES ('$title', '$emotion', '$music', '$content')";

        if ($conn->query($sql) === TRUE) {
            echo "글이 성공적으로 업로드되었습니다.";
        } else {
            echo "글 업로드 오류: " . $conn->error;
        }
    }

// 데이터베이스 연결 종료
$conn->close();
?>