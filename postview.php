<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
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
        $sql = "SELECT title, emotion, content FROM information WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // 검색된 데이터를 가져와서 사용
            $row = $result->fetch_assoc();
            $post_title = $row['title'];
            $content = $row['content'];
            $emotion = $row['emotion'];

            // 동적으로 추가할 HTML 코드 생성
            $post_view = '
            <div class="musicInfo">
                    <div id="musicCover">
                        <img src="img/article_bg/articlebg1.svg" style="object-fit: cover;" alt="">
                    </div>
                    <span id="musicTitle">
                        음악 제목
                    </span>
            </div>

            <section>
                <div id="title">
                    <span>' . $post_title . '</span>
                </div>
                <div class="emoji_div">
                    <img src="img/emoji' . $emotion . '.svg" alt="">
                </div>
            </section>

            <div id="text">
                <span>' . $content . '</span>
            </div>

            <!--  음악 재생 -->
            <audio src="omg.mp3" autoplay loop></audio>';

            // 동적으로 추가할 HTML 코드 반환
            echo $post_view;
        } else {
            echo "해당 ID의 데이터를 찾을 수 없습니다.";
        }
    } else {
        echo "ID 값이 설정되지 않았습니다.";
    }
} else {
    echo "잘못된 요청입니다.";
}

?>