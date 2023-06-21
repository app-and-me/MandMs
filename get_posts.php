<?php
// 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "0000";
$dbname = "mandmz";

// 데이터베이스 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// 감정 선택 값에 따라 DB에서 데이터를 가져오는 쿼리 실행
$selectedEmotion = $_POST['emotion']; // 사용자가 선택한 감정 값

if ($selectedEmotion === "all") {
    $sql = "SELECT * FROM information";
} else {
    $sql = "SELECT * FROM information WHERE emotion = ".$selectedEmotion;
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 결과를 반복하여 출력
    while ($row = $result->fetch_assoc()) {
?>
<div class="post" onclick="postId(<?=$row["id"]?>)" style="cursor: pointer;"> 
    <div class="image">
    <img src="img/article_bg/articlebg<?=$row["music_id"]?>.svg" alt="">
    </div>
    <div class="span_wrapper">
        <span class="title">
            <?=$row["title"]?>
    </span>
    <span class="content">
            <?=$row["content"]?>
    </span>
    </div>
</div>
<?php
    }
} else {
    echo "선택한 감정에 해당하는 글이 없습니다.";
}

// 데이터
