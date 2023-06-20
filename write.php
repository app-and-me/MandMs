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
        $sql = "SELECT album, title, artist, file_path FROM music WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // 검색된 데이터를 가져와서 사용
            $row = $result->fetch_assoc();
            $music_title = $row['title'];
            $artist = $row['artist'];
            $image = $row['album'];
            $audio = $row['file_path'];

            // 동적으로 추가할 HTML 코드 생성
            $musicwrite = '
            <form id="wirteForm">
                <div class="musicInfo">
                    <div id="musicCover">
                        <img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="">
                    </div>
                    <span id="musicTitle">' . $music_title . ' - ' . $artist . '</span>
                </div>
                <section>
                    <input type="text" placeholder="제목을 입력하시오" id="write_title" name="write_title"/>
                    <div class="emoji_radio">
                        <label for="emoji1">
                            <input type="radio" id="emoji1" name="emoji" value="1" onclick="setEmotionValue(this.value)">
                            <img src="img/emoji1.svg" alt="">
                        </label>
                        <label for="emoji2">
                            <input type="radio" id="emoji2" name="emoji" value="2" onclick="setEmotionValue(this.value)">
                            <img src="img/emoji2.svg" alt="">
                        </label>
                        <label for="emoji3">
                            <input type="radio" id="emoji3" name="emoji" value="3" onclick="setEmotionValue(this.value)">
                            <img src="img/emoji3.svg" alt="">
                        </label>
                        <label for="emoji4">
                            <input type="radio" id="emoji4" name="emoji" value="4" onclick="setEmotionValue(this.value)">
                            <img src="img/emoji4.svg" alt="">
                        </label>
                        <label for="emoji5">
                            <input type="radio" id="emoji5" name="emoji" value="5" onclick="setEmotionValue(this.value)">
                            <img src="img/emoji5.svg" alt="">
                        </label>
                    </div>
                    <input type="hidden" id="emotion" name="emotion" value="">
                </section>
                <textarea placeholder="내용을 입력하시오" cols="30" id="write_content" name="write_content"> </textarea>
                <button id="end" onclick="saveData()">끝내기</button>
            </form>
            <!-- 음악 재생 -->
            <audio src="' . $audio . '" autoplay loop></audio>';

            // 동적으로 추가할 HTML 코드 반환
            echo $musicwrite;

            // 데이터베이스에 데이터 저장
            if (isset($_POST['write_title']) && isset($_POST['write_content']) && isset($_POST['emotion'])) {
                $write_title = $_POST['write_title'];
                $write_content = $_POST['write_content'];
                $emotion = $_POST['emotion'];

                // 데이터베이스에 데이터 삽입
                $sql_insert_data = "INSERT INTO information (title, content, music_title, artist, album, file_path, emotion)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt_insert = $conn->prepare($sql_insert_data);
                $stmt_insert->bind_param("sssssss", $write_title, $write_content, $music_title, $artist, $image, $audio, $emotion); 
                if ($stmt_insert->execute()) {
                    $inserted_id = $stmt_insert->insert_id;
                    echo $inserted_id; // 저장된 열의 ID를 반환합니다.
                } else {
                    echo "데이터 저장 실패: " . $stmt_insert->error;
                }
            } else {
                echo "write_title, write_content, emotion 데이터가 올바르게 전송되지 않았습니다.";
            }
            
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