const mysql = require('mysql');
const fs = require('fs');

function insertMp3IntoMySQL(mp3FilePath) {
  // MP3 파일 읽기
  const mp3Data = fs.readFileSync(mp3FilePath);

  // MySQL 연결 설정
  const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '0000',
    database: 'song'
  });

  // MySQL 연결
  connection.connect();

  // BLOB 컬럼에 MP3 데이터 삽입
  const query = 'INSERT INTO my_table (mp3_data) VALUES (?)';
  connection.query(query, [mp3Data], function (error, results, fields) {
    if (error) throw error;
    console.log('MP3 file inserted successfully.');
  });

  // MySQL 연결 종료
  connection.end();
}

insertMp3IntoMySQL('/path/to/my/mp3/file.mp3');