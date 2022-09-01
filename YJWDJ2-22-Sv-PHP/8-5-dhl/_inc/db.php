<?php
//$_tableNames = array(
//    "board" => "board1",
//);
// 부득이하게 테이블 이름을 바꿔야 할경우 board1 부분을 바꿔주면 된다.


const DB_DRIVER = 'mysql';
const DB_HOST = 'localhost';
const DB_NAME = 'myhome';
const DB_LOGIN_ID = 'myhome';
const DB_LOGIN_PWD = 'myhome1234';

$dbConnectionString = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
$db = new PDO($dbConnectionString, DB_LOGIN_ID, DB_LOGIN_PWD);


$_site_options = [

    "board" => [
        "name" => "자유 게시판",
        "tableName" => "board",
        "listPage" => "/board/index.php",
        "writePage" => "/board/write.php",
        "writeOkPage" => "/board/write_ok.php",
        "viewPage" => "/board/view.php",
        "modifyPage" => "/board/modify.php",
        "modifyOkPage" => "/board/modify_ok.php",
        "delPage" => "/board/del.php",
    ],

    "faq" => [
        "name" => "자주하는 질문",
        "tableName" => "faq",
    ],
];
$_board_options = $_site_options['board'];
?>