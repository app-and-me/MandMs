<?php
// 데이터베이스 연결 설정
$servername = "localhost"; // 데이터베이스 서버 주소
$username = "root"; // 데이터베이스 사용자 이름
$password = "1234"; // 데이터베이스 비밀번호
$dbname = "mandmz"; // 데이터베이스 이름

// 데이터베이스 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 선택한 감정 값 가져오기
$emotion = $_GET['emotion'];

// 데이터 조회 쿼리
if ($emotion == 'all') {
    $sql = "SELECT information.id, information.title, music.album
            FROM information
            LEFT JOIN music ON information.music = music.id
            ORDER BY information.id DESC";
} else {
    $sql = "SELECT information.id, information.title, music.album
            FROM information
            LEFT JOIN music ON information.music = music.id
            WHERE information.emotion = '$emotion'
            ORDER BY information.id DESC";
}

// 쿼리 실행 및 결과 가져오기
$result = $conn->query($sql);

// 결과 배열 초기화
$posts = array();

// 결과 출력
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $post_id = $row['id'];
        $write_title = $row['title'];
        $image = $row['album'];

        $post = array(
            "id" => $post_id,
            "title" => $write_title,
            "image" => $image
        );

        $posts[] = $post;
    }

    // JSON 형태로 결과 반환
    $response = array("posts" => $posts);
} else {
    // 게시글이 없을 때 "게시글이 없습니다." 메시지 반환
    $response = array("message" => "게시글이 없습니다.");
}

echo json_encode($response);

// 데이터베이스 연결 종료
$conn->close();
?>
