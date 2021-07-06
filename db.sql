# DB 생성
DROP DATABASE IF EXISTS st__2021_04_full__site15;
CREATE DATABASE st__2021_04_full__site15;
USE st__2021_04_full__site15;

# 게시물 테이블 생성
CREATE TABLE article (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    regDate DATETIME NOT NULL,
    updateDate DATETIME NOT NULL,
    memberId INT(10) UNSIGNED NOT NULL,
    title CHAR(100) NOT NULL,
    `body` TEXT NOT NULL
);

# 테스트 게시물 생성
/*INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 2,
title = '제목1',
`body` = '내용1';

INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 3,
title = '제목2',
`body` = '내용2';

INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 3,
title = '제목3',
`body` = '내용3';

INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 4,
title = '제목4',
`body` = '내용4';*/


# 회원 테이블 생성
CREATE TABLE `member` (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    regDate DATETIME NOT NULL,
    updateDate DATETIME NOT NULL,
    delStatus TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    delDate DATETIME,
    loginId CHAR(20) NOT NULL,
    loginPw CHAR(100) NOT NULL,
    `name` CHAR(20) NOT NULL,
    nickname CHAR(20) NOT NULL,
    email CHAR(100) NOT NULL,
    cellphoneNo CHAR(20) NOT NULL
);

# 테스트 회원 생성
INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'admin1',
loginPw = 'admin1',
`name` = '최최',
nickname = '관리자',
email = 'admin1@test.com',
cellphoneNo = '01011111111';

INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user1',
loginPw = 'user1',
`name` = '철수',
nickname = '파이리',
email = 'user1@test.com',
cellphoneNo = '01022222222';

INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user2',
loginPw = 'user2',
`name` = '영희',
nickname = '피카츄',
email = 'user2@test.com',
cellphoneNo = '01033333333';

INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user3',
loginPw = 'user3',
`name` = '길동',
nickname = '짱구',
email = 'user3@test.com',
cellphoneNo = '01034343434';





INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 1,
title = '토스트 UI 뷰어 사용법',
`body` = '
# 기초(큰 제목)
## 자바스크립트(작은 제목)
```javascript
let a = 10;
console.log(a + 10);
```
## HTML과 자바스크립트
```html
<div class="aritlce"></div>
<script>
let div = document.getElementsByClassName("article")[0];
</script>
```
## SQL
```sql
SELECT *
FROM article
```
## PHP
```php
<?php
$a = 10;
?>
```
## Kotlin
```kotlin
val a = 10
```
';

INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 1,
title = 'SQL 기초 1',
`body` = '
## SQL DATABASE 삭제, 생성
```sql
SHOW DATABASES; # 모든 데이터베이스 조회
DROP DATABASE IF EXISTS base1; # base1 데이터베이스가 존재한다면 삭제
CREATE DATABASE base1; # base1 데이터베이스 생성
USE base1; # base1 데이터베이스 선택

```
';

INSERT INTO article 
SET regDate = NOW(),
updateDate = NOW(),
memberId = 1,
title = 'SQL 기초 2',
`body` = '
## SQL TABLE 생성
```sql
CREATE TABLE article (
    id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, # INT 타입, UNSIGNED 음수(-) 방지, NOT NULL null값 방지,  AUTO_INCREMENT 자동으로 카운트되며 입력(PRIMARY KEY 선언 후 사용하기)
    regDate DATETIME NOT NULL, # DATETIME 날짜타입
    updateDate DATETIME NOT NULL,
    memberId INT(10) UNSIGNED NOT NULL,
    title VARCHAR(100) NOT NULL, # VARCHAR(100) 100자 제한
    `body` TEXT NOT NULL
);
```
';

# 대용량 이미지도 저장가능하도록 수정
ALTER TABLE article MODIFY COLUMN `body` LONGTEXT NOT NULL;