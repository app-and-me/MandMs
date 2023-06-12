<?php
// MySQL 서버 연결 정보
$servername = "localhost"; // 서버 이름
$username = "root"; // 사용자 이름
$password = "1234"; // 비밀번호
$dbname = "mandmz"; // 데이터베이스 이름

// MySQL 서버에 연결
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("MySQL 서버 연결 실패: " . $conn->connect_error);
}

// 데이터베이스 삭제 쿼리
$sql_drop_db = "DROP DATABASE IF EXISTS `$dbname`";
if ($conn->query($sql_drop_db) === TRUE) {
    //echo "데이터베이스 삭제 완료";
} else {
    echo "데이터베이스 삭제 실패: " . $conn->error;
}

// 데이터베이스 생성 쿼리
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$dbname`";
if ($conn->query($sql_create_db) === TRUE) {
    //echo "데이터베이스 생성 완료";
} else {
    echo "데이터베이스 생성 실패: " . $conn->error;
}

// 데이터베이스 선택
$conn->select_db($dbname);

// 다이어리 테이블 생성 쿼리
$sql_create_table = "CREATE TABLE IF NOT EXISTS information (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    music VARCHAR(255),
    emotion INT
)";

if ($conn->query($sql_create_table) === TRUE) {
    //echo "다이어리 테이블 생성 완료";
} else {
    echo "다이어리 테이블 생성 실패: " . $conn->error;
}

// 음악 테이블 생성 쿼리
$sql_create_music_table = "CREATE TABLE IF NOT EXISTS music (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    album MEDIUMBLOB NOT NULL,
    file_path VARCHAR(200) NOT NULL,
    count INT
)";

if ($conn->query($sql_create_music_table) === TRUE) {
    //echo "음악 테이블 생성 완료";
} else {
    echo "음악 테이블 생성 실패: " . $conn->error;
}


// 음악 데이터 삽입 쿼리
$sql_insert_music = "INSERT INTO music (title, artist, album, file_path)
VALUES ('1 of 1', '샤이니', '"  . $conn->real_escape_string(file_get_contents("img/1of1.jpg")) . "', 'music/1 of 1.mp3'),
       ('After LIKE', '아이브', '"  . $conn->real_escape_string(file_get_contents("img/afterlike.jpg")) . "', 'music/1 of 1.mp3'),
       ('마지막처럼', '블랙핑크', '"  . $conn->real_escape_string(file_get_contents("img/마지막처럼.jpg")) . "', 'music/BLACKPINK - 마지막처럼.mp3'),
       ('toxic', 'Britney Spears', '"  . $conn->real_escape_string(file_get_contents("img/afterlike.jpg")) . "', 'music/Britney Spears - Toxic (Official HD Video).mp3'),
       ('viva la vida', 'coldplay', '"  . $conn->real_escape_string(file_get_contents("img/viva la vida.jpg")) . "', 'music/Coldplay - Viva La Vida (한글 가사 해석).mp3'),
       ('double take', 'dhruv', '"  . $conn->real_escape_string(file_get_contents("img/double take.jpg")) . "', 'music/double take.mp3'),
       ('dreams come true', '에스파', '"  . $conn->real_escape_string(file_get_contents("img/Dreams Come True.jpg")) . "', 'music/dreams come true.mp3'),
       ('englishman in new york', 'sting', '"  . $conn->real_escape_string(file_get_contents("img/english man in newyork.jpg")) . "', 'music/englishman in new york.mp3'),
       ('firework', 'katy perry', '"  . $conn->real_escape_string(file_get_contents("img/firework.jpg")) . "', 'music/firework.mp3'),
       ('삐딱하게', '지드래곤', '"  . $conn->real_escape_string(file_get_contents("img/삐딱하게.jpg")) . "', 'music/G-DRAGON(지드래곤) - 삐딱하게(Crooked) [가사 Lyrics].mp3'),
       ('너 그리고 나', '여자친구', '"  . $conn->real_escape_string(file_get_contents("img/너 그리고 나.jpg")) . "', 'music/GFRIEND(여자친구) - NAVILLERA(너 그리고 나) Color Coded Lyrics   [Han Rom Eng].mp3'),
       ('all night', '소녀시대', '"  . $conn->real_escape_string(file_get_contents("img/allnight.jpg")) . "', 'music/Girls’ Generation (소녀시대) (SNSD) – All Night Lyrics (Han Rom Eng Color Coded).mp3'),
       ('high hopes', 'panic!', '"  . $conn->real_escape_string(file_get_contents("img/high hopes.jpg")) . "', 'music/high hopes.mp3'),
       ('얼굴 찌푸리지 말아요', '하이라이트', '"  . $conn->real_escape_string(file_get_contents("img/얼굴 찌푸리지 말아요.jpg")) . "', 'music/Highlight(하이라이트) _ Plz Don’t Be Sad(얼굴 찌푸리지 말아요).mp3'),
       ('hype boy', '뉴진스', '"  . $conn->real_escape_string(file_get_contents("img/hype boy.jpg")) . "', 'music/hype boy.mp3'),
       ('xoxo', '전소미', '"  . $conn->real_escape_string(file_get_contents("img/xoxo.jpg")) . "', 'music/JEON SOMI XOXO Lyrics (전소미 XOXO 가사) (Color Coded Lyrics).mp3'),
       ('삠삠', '전소연', '"  . $conn->real_escape_string(file_get_contents("img/삠삠.jpg")) . "', 'music/JEON SOYEON BEAM BEAM Lyrics (전소연 삠삠 가사) (Color Coded Lyrics).mp3'),
       ('상상더하기', '라붐', '"  . $conn->real_escape_string(file_get_contents("img/상상더하기.jpg")) . "', 'music/Laboum  Imagine More 상상더하기 Fresh Adventure  Lyrics (Color Coded+Han+Rom+Eng).mp3'),
       ('10minutes', '이효리', '"  . $conn->real_escape_string(file_get_contents("img/텐미닛.jpg")) . "', 'music/Lee Hyori (이효리) -  10 Minutes  Lyrics [Color Coded Han Rom Eng].mp3'),
       ('love me rigth', '엑소', '"  . $conn->real_escape_string(file_get_contents("img/love mt right.jpg")) . "', 'music/love me rigth.mp3'),
       ('love', '여자아이들', '"  . $conn->real_escape_string(file_get_contents("img/love.jpg")) . "', 'music/love.mp3'),
       ('maps', '마룬5', '"  . $conn->real_escape_string(file_get_contents("img/maps.jpg")) . "', 'music/maps.mp3'),
       ('Married To The Music', '샤이니', '"  . $conn->real_escape_string(file_get_contents("img/Married To The Music.jpg")) . "', 'music/Married To The Music.mp3'),
       ('sugar', '마룬5', '"  . $conn->real_escape_string(file_get_contents("img/sugar.jpg")) . "', 'music/Maroon 5 sugar 가사 영어 한국 번역.mp3'),
       ('90s love', 'nct u', '"  . $conn->real_escape_string(file_get_contents("img/90s love.jpg")) . "', 'music/NCT U 90s Love Lyrics (Color Coded Lyrics).mp3'),
       ('candy', 'nct dream', '"  . $conn->real_escape_string(file_get_contents("img/candy.jpg")) . "', 'music/NCT DREAM Candy Lyrics (엔시티 드림 Candy 가사) (Color Coded Lyrics).mp3'),
       ('비트박스', 'nct dream', '"  . $conn->real_escape_string(file_get_contents("img/beatbox.jpg")) . "', 'music/NCT DREAM 엔시티 드림 Beatbox (English Ver.) Lyric Video.mp3'),
       ('MUST HAVE LOVE', 'SG 워너비 와 브라운 아이드 걸스', '"  . $conn->real_escape_string(file_get_contents("img/MUST HAVE LOVE.jpg")) . "', 'music/MUST HAVE LOVE.mp3'),
       ('bad girl good girl', '미쓰에이', '"  . $conn->real_escape_string(file_get_contents("img/bad girl.jpg")) . "', 'music/Miss A (미쓰에이) - Bad Girl Good Girl   Color Coded Han Rom Eng Lyrics (가사).mp3'),
       ('MAKING A LOVer', 'ss501', '"  . $conn->real_escape_string(file_get_contents("img/애인만들기.jpg")) . "', 'music/MAKING A LOVER - 꽃보다 남자 OST.mp3'),
       ('cookies', '뉴진스', '"  . $conn->real_escape_string(file_get_contents("img/cookie.jpg")) . "', 'music/NewJeans (뉴진스) - Cookie Audio.mp3'),
       ('ditto', '뉴진스', '"  . $conn->real_escape_string(file_get_contents("img/ditto.jpg")) . "', 'music/NewJeans (뉴진스) - Ditto Audio.mp3'),
       ('attention', '뉴진스', '"  . $conn->real_escape_string(file_get_contents("img/attention.jpg")) . "', 'music/NewJeans Attention Lyrics (뉴진스 Attention 가사) (Color Coded Lyrics).mp3'),
       ('잔소리', '아이유', '"  . $conn->real_escape_string(file_get_contents("img/잔소리.jpg")) . "', 'music/Nitpicking (잔소리 (with 2AM 슬옹)).mp3'),
       ('nothin on you', '브루노마스', '"  . $conn->real_escape_string(file_get_contents("img/nothin on you.jpg")) . "', 'music/nothin on you.mp3'),
       ('omg', '뉴진스', '"  . $conn->real_escape_string(file_get_contents("img/omg.jpg")) . "', 'music/omg.mp3'),
       ('아주나이스', '세븐틴', '"  . $conn->real_escape_string(file_get_contents("img/아주나이스.jpg")) . "', 'music/SEVENTEEN [세븐틴] - Very NICE [아주 NICE] (Color Coded Lyrics   Han Rom Eng).mp3'),
       ('예쁘다', '세븐틴', '"  . $conn->real_escape_string(file_get_contents("img/예쁘다.jpg")) . "', 'music/SEVENTEEN [세븐틴] - Pretty U [예쁘다] (Color Coded Lyrics   Han Rom Eng).mp3'),
       ('레옹', '박명수&아이유', '"  . $conn->real_escape_string(file_get_contents("img/레옹.jpg")) . "', 'music/Park Myung Soo, IU - Leon Lyrics (박명수, 아이유 - 레옹 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('oh pretty woman', 'roy orbison', '"  . $conn->real_escape_string(file_get_contents("img/pretty woman.jpg")) . "', 'music/Pretty Woman (귀여운 여인) OST - Oh Pretty Woman (Lyrics 해석).mp3'),
       ('birthday', '레드벨벳', '"  . $conn->real_escape_string(file_get_contents("img/birthday.jpg")) . "', 'music/Red Velvet Birthday Lyrics (레드벨벳 Birthday 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('birthday', '전소미', '"  . $conn->real_escape_string(file_get_contents("img/벌스데이.jpg")) . "', 'music/SOMI (전소미) – BIRTHDAY (Han Rom Eng) Color Coded Lyrics 한국어 가사.mp3'),
       ('what you waiting for', '전소미', '"  . $conn->real_escape_string(file_get_contents("img/what you waiting for.jpg")) . "', 'music/SOMI (전소미) What You Waiting For lyrics (Color Coded Lyrics Eng Rom Han 가사).mp3'),
       ('덤덤', '전소미', '"  . $conn->real_escape_string(file_get_contents("img/덤덤.jpg")) . "', 'music/SOMI DUMB DUMB Lyrics (전소미 DUMB DUMB 가사) (Color Coded Lyrics).mp3'),
       ('asap', '스테이씨', '"  . $conn->real_escape_string(file_get_contents("img/asap.jpg")) . "', 'music/STAYC ASAP Lyrics (스테이씨 ASAP 가사) (Color Coded Lyrics).mp3'),
       ('색안경', '스테이씨', '"  . $conn->real_escape_string(file_get_contents("img/색안경.jpg")) . "', 'music/STAYC STEREOTYPE Lyrics (스테이씨 색안경 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('테이베어', '스테이씨', '"  . $conn->real_escape_string(file_get_contents("img/테디베어.jpg")) . "', 'music/STAYC Teddy Bear Lyrics (스테이씨 Teddy Bear 가사) (Color Coded Lyrics).mp3'),
       ('weekend', '태연', '"  . $conn->real_escape_string(file_get_contents("img/weekend.jpg")) . "', 'music/TAEYEON Weekend Lyrics (태연 Weekend 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('talk that talk', '태연', '"  . $conn->real_escape_string(file_get_contents("img/talkthattalk.jpg")) . "', 'music/TWICE Talk that Talk Lyrics (트와이스 Talk that Talk 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('어느날 머리에서 뿔이 자랐다', 'txt', '"  . $conn->real_escape_string(file_get_contents("img/어느날 머리에서 뿔이 자랐다.jpg")) . "', 'music/TXT - CROWN (어느날 머리에서 뿔이 자랐다) (Color Coded Lyrics Eng Rom Han 가사).mp3'),
       ('5시 53분의 하늘에서 발견한 너와나', 'txt', '"  . $conn->real_escape_string(file_get_contents("img/테디베어.jpg")) . "', 'music/TXT Blue Hour Lyrics (투모로우바이투게더 5시 53분의 하늘에서 발견한 너와 나 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('9와 4분의 3 승강장에서 너를 기다려', 'txt', '"  . $conn->real_escape_string(file_get_contents("img/9와 4분의 3승강장에서 너를 기다려.jpg")) . "', 'music/TXT Run Away Lyrics (투모로우바이투게더 9와 4분의 3 승강장에서 너를 기다려 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('after school', 'weekely', '"  . $conn->real_escape_string(file_get_contents("img/after school.jpg")) . "', 'music/Weeekly - After School Lyrics (위클리 - After School 가사) [Color Coded Han Rom Eng].mp3'),      
       ('tell me', '원더걸스', '"  . $conn->real_escape_string(file_get_contents("img/텔미.jpg")) . "', 'music/Wonder Girls – Tell Me Lyrics [HAN ROM ENG].mp3'),
       ('y', '프리스타일', '"  . $conn->real_escape_string(file_get_contents("img/프리스타일 y.jpg")) . "', 'music/Y (Please Tell Me Why) - 프리스타일 가사(LYRICS) [오늘도 노래 한 곡].mp3'),
       ('스마트폰', '예나', '"  . $conn->real_escape_string(file_get_contents("img/스마트폰.jpg")) . "', 'music/YENA SMARTPHONE Lyrics (최예나 스마트폰 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('스마일리', '예나', '"  . $conn->real_escape_string(file_get_contents("img/스마일리.jpg")) . "', 'music/최예나 스마일리 가사 YENA SMILEY Lyrics (feat. 비비 BIBI)   Color Coded   Han Rom Eng.mp3'),
       ('비밀번호 486', '윤하', '"  . $conn->real_escape_string(file_get_contents("img/비밀번호 486.jpg")) . "', 'music/Younha (윤하) -  Password 486 (비밀번호 486)  Lyrics [Color Coded Han Rom Eng].mp3'),
       ('roar', 'katyparry', '"  . $conn->real_escape_string(file_get_contents("img/roar.jpg")) . "', 'music/내 자존감에 시동 걸어주는 노래   Katy Perry (케이티 페리) - Roar (가사 해석 lyrics).mp3'),
       ('우리 사랑하게 됐어요', '조권&가인', '"  . $conn->real_escape_string(file_get_contents("img/우리 사랑하게 됐어요.jpg")) . "', 'music/가인, 조권 - 우리 사랑하게 됐어요 [가사 Lyrics].mp3'),
       ('나는 나비 (A Flying Butterfly)', 'yb', '"  . $conn->real_escape_string(file_get_contents("img/나는나비.jpg")) . "', 'music/나는 나비 (A Flying Butterfly).mp3'),
       ('버터플라이', '러브홀릭스', '"  . $conn->real_escape_string(file_get_contents("img/버터플라이.jpg")) . "', 'music/러브홀릭스(Loveholics) - Butterfly [국가대표 OST] [가사 Lyrics].mp3'),
       ('헤어지지못하는여자', '리쌍', '"  . $conn->real_escape_string(file_get_contents("img/헤어지지못하는여자.jpg")) . "', 'music/리쌍(LeeSSang) - 헤어지지 못하는 여자, 떠나가지 못하는 남자 (Feat. 정인) [가사 Lyrics].mp3'),
       ('칵테일사랑', '마로니에', '"  . $conn->real_escape_string(file_get_contents("img/칵테일사랑.jpg")) . "', 'music/마로니에 칵테일사랑 (가사 첨부).mp3'),
       ('가시', '버즈', '"  . $conn->real_escape_string(file_get_contents("img/가시.jpg")) . "', 'music/버즈(Buzz) - 가시 [가사 Lyrics].mp3'),
       ('붉은노을', '빅뱅', '"  . $conn->real_escape_string(file_get_contents("img/붉은노을.jpg")) . "', 'music/붉은 노을 (Sunset Glow).mp3'),
       ('외톨이야', '씨엔블루', '"  . $conn->real_escape_string(file_get_contents("img/외톨이야.jpg")) . "', 'music/씨엔블루 (CNBLUE) - 외톨이야.mp3'),
       ('유리구슬', '여자친구', '"  . $conn->real_escape_string(file_get_contents("img/유리구슬.jpg")) . "', 'music/여자친구 (ヨジャチング)－「유리구슬 GLASS BEAD」LYRICS 가사 한국어.mp3'),
       ('barbie girl', 'auqa', '"  . $conn->real_escape_string(file_get_contents("img/barbie girl.jpg")) . "', 'music/전 세계인의 동심을 파괴한 노래  Aqua - Barbie Girl [가사 번역].mp3'),
       ('오리날다', '체리필터', '"  . $conn->real_escape_string(file_get_contents("img/오리날다.jpg")) . "', 'music/체리필터 - 오리날다 [가사 Lyrics].mp3'),
       ('낭만고양이', '체리필터', '"  . $conn->real_escape_string(file_get_contents("img/낭만고양이.jpg")) . "', 'music/체리필터(cherryfilter) - 낭만고양이 [가사 Lyrics].mp3'),
       ('우리의 꿈', '코요태', '"  . $conn->real_escape_string(file_get_contents("img/우리의 꿈.jpg")) . "', 'music/코요태 - 우리의 꿈 가사 (Lyrics).mp3')";

if ($conn->query($sql_insert_music) === TRUE) {
    //echo "데이터 삽입 완료";
} else {
    echo "데이터 삽입 실패: " . $conn->error;
}


// MySQL 서버 연결 종료
$conn->close();
?>
