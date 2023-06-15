<?php
include_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] ?? '' == "POST") {
    // 검색어를 폼에서 가져옴
    $searchQuery = $_POST['searchQuery'];

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

    // 검색어를 기반으로 음악 데이터를 가져오는 SQL 쿼리
    $sql = "SELECT * FROM music WHERE title LIKE '%$searchQuery%' OR artist LIKE '%$searchQuery%'";

    // 쿼리를 실행하고 결과를 가져옴
    $result = $conn->query($sql);

    // 결과가 존재하는지 확인
    if ($result->num_rows > 0) {
        // 각 결과의 행을 반복하면서 음악 데이터를 표시하는 HTML 요소를 생성
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $title = $row['title'];
            $artist = $row['artist'];
            $audio = $row['file_path'];
            $image = $row['album'];

            // 음악 데이터를 표시하는 HTML 코드를 생성
            $musicElement = '
                <div class="result">
                    <div class="image">
                        <img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="">
                    </div>
                    <span class="musicTitle">' . $title . '</span>
                    <div class="icons">
                        <button type="button" onclick="playAudio(\'' . $audio . '\')">
                            <i class="fa-solid fa-play fa-xl" style="color: #2b2b2b;"></i>
                        </button>
                        <button type="button" onclick="pauseAudio(\'' . $audio . '\')">
                            <i class="fa-solid fa-pause fa-xl" style="color: #2b2b2b;"></i>
                        </button>
                        <a href="write.php?id=' . $id . '" target="_top" class="write">
                            <i class="fa-regular fa-pen-to-square fa-xl" style="color: #2b2b2b;"></i>
                        </a>
                    </div>
                    <span class="musicSinger">' . $artist . '</span>
                    <audio class="audio-element">
                        <source src="' . $audio . '" type="audio/mpeg">
                    </audio>
                </div>';

            // 검색 결과 섹션에 표시할 HTML 코드를 반환
            echo $musicElement;
        }
    } else {
        // 결과가 없을 경우 메시지를 반환
        echo "검색 결과가 없습니다.";
    }

    // MySQL 서버 연결을 닫기
    $conn->close();
}
?>
