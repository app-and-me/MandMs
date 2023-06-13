<?php
// MySQL 서버 연결 정보
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mandmz";

// 데이터베이스 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 정보 가져오기 쿼리 실행
$query = "SELECT album FROM music";
$result = $conn->query($query);

// 가져온 정보를 HTML 템플릿에 채우기
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $album = $row['album'];

        // 글에 맞는 이미지가 나오려면?
        $albumUpload = '<div class="image">
                            <img src="data:image/jpeg;base64,' . base64_encode($album) . '" alt="앨범커버  ">
                        </div>';
    }

    echo $albumUpload;
    
} else {
    echo "No results found.";
}

// 연결 종료
$conn->close();
?>