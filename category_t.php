<?php
// MySQL 서버 연결 정보
$servername = "localhost";
$username = "root";
$password = "0000";
$dbname = "mandmz";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 정보 가져오기 쿼리 실행
$query = "SELECT title, music FROM information";
$result = $conn->query($query);

// 가져온 정보를 HTML 템플릿에 채우기
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $music = $row['music'];

        $diaryUpload = '<div class="span_wrapper">
                            <span class="title">'.$title.'</span>
                            <span class="song">'.$music.'</span>
                        </div>';
    }

    echo $diaryUpload;
    
} else {
    echo "No results found.";
}

// 연결 종료
$conn->close();
?>