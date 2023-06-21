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
$sql = "SELECT id, title FROM information";


// 쿼리 실행 및 결과 가져오기
$result = $conn->query($sql);

// 결과 출력
if ($result->num_rows > 0) {

  $sql = "SELECT id, title, music FROM information";

  // 쿼리 실행 및 결과 가져오기
  $result = $conn->query($sql);

  $img_index = 1;
    while ($row = $result->fetch_assoc()) {
      $post_id = $row['id'];
      $write_title = $row['title'];
      $post_list = ' 
      <div class="post" onclick="postId('. $post_id .')"> 
        <div class="image">
          <img src="img/thumb/th'. $img_index .'.jpg" alt="앨범커버">
        </div>
        <div class="span_wrapper">
            <span class="title">
                ' . $write_title . '
            </span>
            <span class="song">
            </span>
        </div>
      </div>';
      $img_index++;
      if($img_index > 20){
        $img_index = 1;
      }
      echo $post_list; "<span>음악이 없습니다.</span>";
      // }
  }// while
} else {
  echo "<span>게시글이 없습니다.</span>";
}

// 데이터베이스 연결 종료
$conn->close();
?>