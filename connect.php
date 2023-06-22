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
    echo "데이터베이스 삭제 완료";
} else {
    echo "데이터베이스 삭제 실패: " . $conn->error;
}

// 데이터베이스 생성 쿼리
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$dbname`";
if ($conn->query($sql_create_db) === TRUE) {
    echo "데이터베이스 생성 완료";
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
    emotion VARCHAR(255)
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "다이어리 테이블 생성 완료";
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
    echo "음악 테이블 생성 완료";
} else {
    echo "음악 테이블 생성 실패: " . $conn->error;
}


// 음악 데이터 삽입 쿼리
$sql_insert_music = "INSERT INTO music (title, artist, album, file_path)
VALUES ('1 of 1', '샤이니', '"  . "img/1of1.jpg" . "', 'music/1 of 1.mp3'),
       ('After LIKE', '아이브', '"  . "img/afterlike.jpg" . "', 'music/After LIKE.mp3'),
       ('마지막처럼', '블랙핑크', '"  . "img/마지막처럼.jpg" . "', 'music/BLACKPINK - 마지막처럼.mp3'),
       ('toxic', 'Britney Spears', '"  . "img/toxic.jpg" . "', 'music/Britney Spears - Toxic (Official HD Video).mp3'),
       ('viva la vida', 'coldplay', '"  . "img/viva la vida.jpg" . "', 'music/Coldplay - Viva La Vida (한글 가사 해석).mp3'),
       ('double take', 'dhruv', '"  . "img/double take.jpg" . "', 'music/double take.mp3'),
       ('dreams come true', '에스파', '"  . "img/Dreams Come True.jpg" . "', 'music/dreams come true.mp3'),
       ('englishman in new york', 'sting', '"  . "img/english man in newyork.jpg" . "', 'music/englishman in new york.mp3'),
       ('firework', 'katy perry', '"  . "img/firework.jpg" . "', 'music/firework.mp3'),
       ('삐딱하게', '지드래곤', '"  .  "img/삐딱하게.jpg" . "', 'music/G-DRAGON(지드래곤) - 삐딱하게(Crooked) [가사 Lyrics].mp3'),
       ('너 그리고 나', '여자친구', '"  .  "img/너 그리고 나.jpg" . "', 'music/GFRIEND(여자친구) - NAVILLERA(너 그리고 나) Color Coded Lyrics   [Han Rom Eng].mp3'),
       ('all night', '소녀시대', '"  .  "img/allnight.jpg"   . "', 'music/Girls’ Generation (소녀시대) (SNSD) – All Night Lyrics (Han Rom Eng Color Coded).mp3'),
       ('high hopes', 'panic!', '"  .  "img/high hopes.jpg"   . "', 'music/high hopes.mp3'),
       ('얼굴 찌푸리지 말아요', '하이라이트', '"  .  "img/얼굴 찌푸리지 말아요.jpg"   . "', 'music/Highlight(하이라이트) _ Plz Don’t Be Sad(얼굴 찌푸리지 말아요).mp3'),
       ('hype boy', '뉴진스', '"  .  "img/hype boy.jpg"   . "', 'music/hype boy.mp3'),
       ('xoxo', '전소미', '"  .  "img/xoxo.jpg"   . "', 'music/JEON SOMI XOXO Lyrics (전소미 XOXO 가사) (Color Coded Lyrics).mp3'),
       ('삠삠', '전소연', '"  .  "img/삠삠.jpg"   . "', 'music/JEON SOYEON BEAM BEAM Lyrics (전소연 삠삠 가사) (Color Coded Lyrics).mp3'),
       ('상상더하기', '라붐', '"  .  "img/상상더하기.jpg"   . "', 'music/Laboum  Imagine More 상상더하기 Fresh Adventure  Lyrics (Color Coded+Han+Rom+Eng).mp3'),
       ('10minutes', '이효리', '"  .  "img/텐미닛.jpg"   . "', 'music/Lee Hyori (이효리) -  10 Minutes  Lyrics [Color Coded Han Rom Eng].mp3'),
       ('love me rigth', '엑소', '"  .  "img/love mt right.jpg"   . "', 'music/love me rigth.mp3'),
       ('love', '여자아이들', '"  .  "img/love.jpg"   . "', 'music/love.mp3'),
       ('maps', '마룬5', '"  .  "img/maps.jpg"   . "', 'music/maps.mp3'),
       ('Married To The Music', '샤이니', '"  .  "img/Married To The Music.jpg"   . "', 'music/Married To The Music.mp3'),
       ('sugar', '마룬5', '"  .  "img/sugar.jpg"   . "', 'music/Maroon 5 sugar 가사 영어 한국 번역.mp3'),
       ('90s love', 'nct u', '"  .  "img/90s love.jpg"   . "', 'music/NCT U 90s Love Lyrics (Color Coded Lyrics).mp3'),
       ('candy', 'nct dream', '"  .  "img/candy.jpg"   . "', 'music/NCT DREAM Candy Lyrics (엔시티 드림 Candy 가사) (Color Coded Lyrics).mp3'),
       ('비트박스', 'nct dream', '"  .  "img/beatbox.jpg"   . "', 'music/NCT DREAM 엔시티 드림 Beatbox (English Ver.) Lyric Video.mp3'),
       ('MUST HAVE LOVE', 'SG 워너비 와 브라운 아이드 걸스', '"  .  "img/MUST HAVE LOVE.jpg"   . "', 'music/MUST HAVE LOVE.mp3'),
       ('bad girl good girl', '미쓰에이', '"  .  "img/bad girl.jpg"   . "', 'music/Miss A (미쓰에이) - Bad Girl Good Girl   Color Coded Han Rom Eng Lyrics (가사).mp3'),
       ('making a lover', 'ss501', '"  .  "img/애인만들기.jpg"   . "', 'music/MAKING A LOVER - 꽃보다 남자 OST.mp3'),
       ('cookies', '뉴진스', '"  .  "img/cookie.jpg"   . "', 'music/NewJeans (뉴진스) - Cookie Audio.mp3'),
       ('ditto', '뉴진스', '"  .  "img/ditto.jpg"   . "', 'music/NewJeans (뉴진스) - Ditto Audio.mp3'),
       ('attention', '뉴진스', '"  .  "img/attention.jpg"   . "', 'music/NewJeans Attention Lyrics (뉴진스 Attention 가사) (Color Coded Lyrics).mp3'),
       ('잔소리', '아이유', '"  .  "img/잔소리.jpg"   . "', 'music/Nitpicking (잔소리 (with 2AM 슬옹  .mp3'),
       ('nothin on you', '브루노마스', '"  .  "img/nothin on you.jpg"   . "', 'music/nothin on you.mp3'),
       ('omg', '뉴진스', '"  .  "img/omg.jpg"   . "', 'music/omg.mp3'),
       ('아주 나이스', '세븐틴', '"  .  "img/아주나이스.jpg"   . "', 'music/SEVENTEEN [세븐틴] - Very NICE [아주 NICE] (Color Coded Lyrics   Han Rom Eng).mp3'),
       ('예쁘다', '세븐틴', '"  .  "img/예쁘다.jpg"   . "', 'music/SEVENTEEN [세븐틴] - Pretty U [예쁘다] (Color Coded Lyrics   Han Rom Eng).mp3'),
       ('레옹', '박명수&아이유', '"  .  "img/레옹.jpg"   . "', 'music/Park Myung Soo, IU - Leon Lyrics (박명수, 아이유 - 레옹 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('oh pretty woman', 'roy orbison', '"  .  "img/pretty woman.jpg"   . "', 'music/Pretty Woman (귀여운 여인) OST - Oh Pretty Woman (Lyrics 해석).mp3'),
       ('birthday', '레드벨벳', '"  .  "img/birthday.jpg"   . "', 'music/Red Velvet Birthday Lyrics (레드벨벳 Birthday 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('birthday', '전소미', '"  .  "img/벌스데이.jpg"   . "', 'music/SOMI (전소미) – BIRTHDAY (Han Rom Eng) Color Coded Lyrics 한국어 가사.mp3'),
       ('what you waiting for', '전소미', '"  .  "img/what you waiting for.jpg"   . "', 'music/SOMI (전소미) What You Waiting For lyrics (Color Coded Lyrics Eng Rom Han 가사).mp3'),
       ('덤덤', '전소미', '"  .  "img/덤덤.jpg"   . "', 'music/SOMI DUMB DUMB Lyrics (전소미 DUMB DUMB 가사) (Color Coded Lyrics).mp3'),
       ('asap', '스테이씨', '"  .  "img/asap.jpg"   . "', 'music/STAYC ASAP Lyrics (스테이씨 ASAP 가사) (Color Coded Lyrics).mp3'),
       ('색안경', '스테이씨', '"  .  "img/색안경.jpg"   . "', 'music/STAYC STEREOTYPE Lyrics (스테이씨 색안경 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('테이베어', '스테이씨', '"  .  "img/테디베어.jpg"   . "', 'music/STAYC Teddy Bear Lyrics (스테이씨 Teddy Bear 가사) (Color Coded Lyrics).mp3'),
       ('weekend', '태연', '"  .  "img/weekend.jpg"   . "', 'music/TAEYEON Weekend Lyrics (태연 Weekend 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('talk that talk', '태연', '"  .  "img/talkthattalk.jpg"   . "', 'music/TWICE Talk that Talk Lyrics (트와이스 Talk that Talk 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('어느날 머리에서 뿔이 자랐다', 'txt', '"  .  "img/어느날 머리에서 뿔이 자랐다.jpg"   . "', 'music/TXT - CROWN (어느날 머리에서 뿔이 자랐다) (Color Coded Lyrics Eng Rom Han 가사).mp3'),
       ('5시 53분의 하늘에서 발견한 너와나', 'txt', '"  .  "img/테디베어.jpg"   . "', 'music/TXT Blue Hour Lyrics (투모로우바이투게더 5시 53분의 하늘에서 발견한 너와 나 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('9와 4분의 3 승강장에서 너를 기다려', 'txt', '"  .  "img/9와 4분의 3승강장에서 너를 기다려.jpg"   . "', 'music/TXT Run Away Lyrics (투모로우바이투게더 9와 4분의 3 승강장에서 너를 기다려 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('after school', 'weekely', '"  .  "img/after school.jpg"   . "', 'music/Weeekly - After School Lyrics (위클리 - After School 가사) [Color Coded Han Rom Eng].mp3'),      
       ('tell me', '원더걸스', '"  .  "img/텔미.jpg"   . "', 'music/Wonder Girls – Tell Me Lyrics [HAN ROM ENG].mp3'),
       ('y', '프리스타일', '"  .  "img/프리스타일 y.jpg"   . "', 'music/Y (Please Tell Me Why) - 프리스타일 가사(LYRICS) [오늘도 노래 한 곡].mp3'),
       ('스마트폰', '예나', '"  .  "img/스마트폰.jpg"   . "', 'music/YENA SMARTPHONE Lyrics (최예나 스마트폰 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('스마일리', '예나', '"  .  "img/스마일리.jpg"   . "', 'music/최예나 스마일리 가사 YENA SMILEY Lyrics (feat. 비비 BIBI)   Color Coded   Han Rom Eng.mp3'),
       ('비밀번호 486', '윤하', '"  .  "img/비밀번호 486.jpg"   . "', 'music/Younha (윤하) -  Password 486 (비밀번호 486)  Lyrics [Color Coded Han Rom Eng].mp3'),
       ('roar', 'katyparry', '"  .  "img/roar.jpg"   . "', 'music/내 자존감에 시동 걸어주는 노래   Katy Perry (케이티 페리) - Roar (가사 해석 lyrics).mp3'),
       ('우리 사랑하게 됐어요', '조권&가인', '"  .  "img/우리 사랑하게 됐어요.jpg"   . "', 'music/가인, 조권 - 우리 사랑하게 됐어요 [가사 Lyrics].mp3'),
       ('나는 나비 (A Flying Butterfly)', 'yb', '"  .  "img/나는나비.jpg"   . "', 'music/나는 나비 (A Flying Butterfly).mp3'),
       ('버터플라이', '러브홀릭스', '"  .  "img/버터플라이.jpg"   . "', 'music/러브홀릭스(Loveholics) - Butterfly [국가대표 OST] [가사 Lyrics].mp3'),
       ('헤어지지못하는여자', '리쌍', '"  .  "img/헤어지지못하는여자.jpg"   . "', 'music/리쌍(LeeSSang) - 헤어지지 못하는 여자, 떠나가지 못하는 남자 (Feat. 정인) [가사 Lyrics].mp3'),
       ('칵테일사랑', '마로니에', '"  .  "img/칵테일사랑.jpg"   . "', 'music/마로니에 칵테일사랑 (가사 첨부).mp3'),
       ('가시', '버즈', '"  .  "img/가시.jpg"   . "', 'music/버즈(Buzz) - 가시 [가사 Lyrics].mp3'),
       ('붉은노을', '빅뱅', '"  .  "img/붉은노을.jpg"   . "', 'music/붉은 노을 (Sunset Glow).mp3'),
       ('외톨이야', '씨엔블루', '"  .  "img/외톨이야.jpg"   . "', 'music/씨엔블루 (CNBLUE) - 외톨이야.mp3'),
       ('유리구슬', '여자친구', '"  .  "img/유리구슬.jpg"   . "', 'music/여자친구 (ヨジャチング)－「유리구슬 GLASS BEAD」LYRICS 가사 한국어.mp3'),
       ('barbie girl', 'auqa', '"  .  "img/barbie girl.jpg"   . "', 'music/전 세계인의 동심을 파괴한 노래  Aqua - Barbie Girl [가사 번역].mp3'),
       ('오리날다', '체리필터', '"  .  "img/오리날다.jpg"   . "', 'music/체리필터 - 오리날다 [가사 Lyrics].mp3'),
       ('낭만고양이', '체리필터', '"  .  "img/낭만고양이.jpg"   . "', 'music/체리필터(cherryfilter) - 낭만고양이 [가사 Lyrics].mp3'),
       ('우리의 꿈', '코요태', '"  .  "img/우리의 꿈.jpg"   . "', 'music/코요태 - 우리의 꿈 가사 (Lyrics).mp3'),
       ('퀸카', '여자 아이들', '"  .  "img/퀸카.png"   . "', 'music/퀸카.mp3'),
       ('보트', '죠지', '"  .  "img/boat.png"   . "', 'music/[Lyrics   가사] 죠지 (George) - 보트 (Boat).mp3'),
       ('out of time', 'the weeknd', '"  .  "img/out of time.png"   . "', 'music/✨시티팝 찢었다  The Weeknd - Out of Time [가사 해석 lyrics].mp3'),
       ('그라데이션', '십센치', '"  .  "img/그라데이션.png"   . "', 'music/10CM – Gradation (그라데이션)   Kpop  OST  Lyrics   가사   한글.mp3'),
       ('넥스트레벨', '에스파', '"  .  "img/넥스트레벨.png"   . "', 'music/넥스트레벨.mp3'),
       ('spicy', '에스파', '"  .  "img/스파이시.png"   . "', 'music/aespa Spicy Lyrics (에스파 Spicy 가사) (Color Coded Lyrics).mp3'),
       ('에라 모르겠다', '빅뱅', '"  .  "img/에라모르겠다.png"   . "', 'music/BIGBANG FXXK IT Lyrics (빅뱅 에라 모르겠다 가사) (Color Coded Lyrics).mp3'),
       ('핑크베놈', '블랙핑크', '"  .  "img/핑크베놈.png"   . "', 'music/BLACKPINK - ‘Pink Venom’ (Official Audio).mp3'),
       ('셧다운', '블랙핑크', '"  .  "img/셧다운.png"   . "', 'music/BLACKPINK - ‘Shut Down’ M V.mp3'),
       ('뚜두뚜두', '블랙핑크', '"  .  "img/뚜두뚜두.png"   . "', 'music/BLACKPINK - ‘뚜두뚜두 (DDU-DU DDU-DU)’ M V.mp3'),
       ('붐바야', '블랙핑크', '"  .  "img/붐바야.png"   . "', 'music/BLACKPINK – BOOMBAYAH (붐바야) (Color Coded Han Rom Eng Lyrics)   by Yankat.mp3'),
       ('kill this love', '블랙핑크', '"  .  "img/kill this love.png"   . "', 'music/BLACKPINK - Kill This Love (Color Coded Lyrics Eng Rom Han 가사).mp3'),
       ('휘파람', '블랙핑크', '"  .  "img/휘파람.png"   . "', 'music/BLACKPINK – Whistle (휘파람) (Color Coded Han Rom Eng Lyrics)   by Yankat.mp3'),
       ('럽식걸즈', '블랙핑크', '"  .  "img/Lovesick Girls.png"   . "', 'music/BLACKPINK Lovesick Girls Lyrics (블랙핑크 Lovesick Girls 가사) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('화이팅 해야지', '부석순', '"  .  "img/화이팅 해야지.png"   . "', 'music/화이팅해야지.mp3'),
       ('dangerously', '찰리푸스', '"  .  "img/dangerously.png"   . "', 'music/Charlie Puth - Dangerously [Official Audio].mp3'),
       ('여름여름해', '여자친구', '"  .  "img/여름여름해.png"   . "', 'music/GFRIEND(여자친구) - Sunny Summer (여름여름해) LYRICS (Color Coded Eng Rom Han 가사).mp3'),
       ('all i wanna do', '박재범', '"  .  "img/all i wanna do.png"   . "', 'music/Jay Park(박재범) - All I Wanna Do (feat. Hoody & Loco) 가사ㅣLyricㅣsmay.mp3'),
       ('솔로', '제니', '"  .  "img/SOLO.png"   . "', 'music/솔로.mp3'),
       ('all eyes on me', '지수', '"  .  "img/all eyes on me.png"   . "', 'music/JISOO All Eyes On Me Lyrics (지수 All Eyes On Me 가사) (Color Coded Lyrics).mp3'),
       ('꽃', '지수', '"  .  "img/꽃.png"   . "', 'music/JISOO FLOWER Lyrics (지수 꽃 가사) (Color Coded Lyrics).mp3'),
       ('ANTIFRAGLE', '르세라핌', '"  .  "img/ANTIFRAGLE.png"   . "', 'music/ANTIFRAGLE.mp3'),
       ('이브 프시케 그리고 푸른 수염의 아내', '르세라핌', '"  .  "img/이브 프시케 그리고 푸른 수염의 아내.png"   . "', 'music/이브 프시케 그리고 푸른 수염의 아내.mp3'),
       ('Fearless', '르세라핌', '"  .  "img/Fearless.png"   . "', 'music/LE SSERAFIM FEARLESS Lyrics (레세라핌 피어리스 가사) [Color Coded Lyrics Eng Rom Han 가사].mp3'),
       ('unforgiven', '르세라핌', '"  .  "img/unforgiven.png"   . "', 'music/LE SSERAFIM UNFORGIVEN (feat. Nile Rodgers) Lyrics (Color Coded Lyrics).mp3'),
       ('영웅', '엔씨티 127', '"  .  "img/영웅.png"   . "', 'music/kick it.mp3'),
       ('stikcer', '엔씨티 127', '"  .  "img/스티커.png"   . "', 'music/stikcer.mp3'),
       ('오르골', '엔씨티 127', '"  .  "img/오르골.png"   . "', 'music/오르골.mp3'),
       ('버퍼링', '엔씨티', '"  .  "img/버퍼링.png"   . "', 'music/버퍼링.mp3'),
       ('i aint worried', '원퍼블릭', '"  .  "img/i ain't worried.png"   . "', 'music/i aint worried.mp3'),
       ('dice', '엔믹스', '"  .  "img/dice.png"   . "', 'music/NMIXX DICE Lyrics (엔믹스 DICE 가사) (Color Coded Lyrics).mp3'),
       ('o.o', '엔믹스', '"  .  "img/o.o.png"   . "', 'music/o.o.mp3'),
       ('에이틴', '세븐틴', '"  .  "img/에이틴.png"   . "', 'music/SEVENTEEN (세븐틴) - A-TEEN (에이틴 OST) [Lyrics Color Coded Han Rom Eng].mp3'),
       ('shake it', '씨스타', '"  .  "img/shake it.png"   . "', 'music/SISTAR (씨스타) - SHAKE IT (Color Coded Han Rom Eng Lyrics)   by YankaT.mp3'),
       ('백도어', '스키즈', '"  .  "img/백도어.png"   . "', 'music/Stray Kids  Back Door  Lyrics (스트레이 키즈 Back Door 가사) (Color Coded Lyrics).mp3'),
       ('after hours', 'the weeknd', '"  .  "img/after hours.png"   . "', 'music/The Weeknd (위켄드) - After Hours [가사해석 번역].mp3'),
       ('on your own', 'vacations', '"  .  "img/on your own.png"   . "', 'music/VACATIONS - On Your Own (Single).mp3'),
       ('Young, Dumb, Stupid', '엔믹스', '"  .  "img/Young Dumb Stupid.png"   . "', 'music/Young, Dumb, Stupid.mp3'),
       ('die for you', 'the weeknd', '"  .  "img/die for you.png"   . "', 'music/사랑 때문에 죽을 수 있어 Die for you - The weeknd [가사해석 자막 lyric].mp3'),
       ('다시여기바닷가', '싹쓰리', '"  .  "img/다시여기바닷가.png"   . "', 'music/싹쓰리 다시 여기 바닷가 가사 (SSAK3 Beach Again Lyrics) [Color Coded Lyrics Han Rom Eng].mp3'),
       ('러빙유', '씨스타', '"  .  "img/러빙유.png"   . "', 'music/씨스타 - Loving U (러빙유) [가사 Lyrics].mp3'),
       ('로맨틱 선데이', '카더가든', '"  .  "img/로맨틱 선데이.png"   . "', 'music/카더가든(Car the garden) - 로맨틱 선데이 (Romantic Sunday) (갯마을 차차차 OST) Hometown Cha-Cha-Cha OST Part 1.mp3'),
       ('와르르', '콜드', '"  .  "img/와르르.png"   . "', 'music/콜드 (Colde) - 와르르 ♥   가사.mp3'),
       ('뜨거운 안녕', '토이', '"  .  "img/뜨거운 안녕.png"   . "', 'music/토이(Toy)   뜨거운 안녕 (가사 첨부).mp3'),
       ('누드', '여자아이들', '"  .  "img/누드.png"   . "', 'music/(G)I-DLE Nxde Lyrics ((여자)아이들 Nxde 가사) (Color Coded Lyrics).mp3')";
if ($conn->query($sql_insert_music) === TRUE) {
    echo "데이터 삽입 완료";
} else {
    echo "데이터 삽입 실패: " . $conn->error;
}


// MySQL 서버 연결 종료
$conn->close();
?>