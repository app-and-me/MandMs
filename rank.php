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

// 데이터 조회 쿼리
$sql = "SELECT title, artist FROM music ORDER BY count DESC LIMIT 5";


// 쿼리 실행 및 결과 가져오기
$result = $conn->query($sql);

// 결과 출력
if ($result->num_rows > 0) {
    $rank = 1;
    while ($row = $result->fetch_assoc()) {
    $music_title = $row['title'];
    $music_artist = $row['artist'];
    
    $rank_div = ' 
    <div id="rank_'. $rank . '">
        <span class="rank">'. $rank .'위</span>
        <span class="music_info">'. $music_title .'-'. $music_artist .'</span>
    </div>';

    $rank = $rank + 1;

    echo $rank_div;
    }
} else {
    $fair_div = ' 
    <div id="rank_1">
        <span class="rank">실패</span>
        <span class="music_info">실패</span>
    </div>';

    echo $fair_div;
}

// 데이터베이스 연결 종료
$conn->close();
?>