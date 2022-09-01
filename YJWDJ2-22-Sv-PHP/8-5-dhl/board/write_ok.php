<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>

<!---<(물음표)php
//    // 변수명은 달러 표시가 앞에 반드시 붙어야 한다.
//    // &은 주소값이라는 뜻 변수 자체를 체크한다.
////    function take(&$var1, $defValue='') {
////        return isset($var1) ? $var1 : $defValue;
////    }
//
//
////    function get($index, $defValue='') {
////        return take($_GET[$index], $defValue);
////    }
//    //$subject = get('subject', '제목 없음');
//    //$subject = get('writer', '작성자 없음');
//
//
////    function post($index, $defValue='') {
////        return take($_POST[$index], $defValue);
////    }
//    //$subject = post('subject', '제목 없음');
//    //$subject = post('writer', '작성자 없음');
//
//
//    echo 'write_ok.php';
//    echo ' / ';
//    echo '<br>';
//    //var_dump($_GET['options']);
//
//
//
//    //$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : '제목 없음';
//    //$writer = isset($_REQUEST['writer']) ? $_REQUEST['writer'] : '작성자 없음';
//    //$subject = take($_POST['subject'], '제목 없음');
//    //$writer = take($_POST['writer'], '작성자 없음');
//    //$subject = take($_GET['subject'], '제목 없음');
//    //$writer = take($_GET['writer'], '작성자 없음');
//
//    $options = post('options', []);
//
//    $isNotice = post('isNotice', 'n');
//    if($isNotice != 'y') $isNotice = 'n'; // 공격에 대비해 y, n 이외 값이 못들어가 가게 함.
//    // 'y'의 따옴표 제대로 안넣으면 결과물 자체가 안나옴 ㄷㄷ
//
//    $subject = post('subject', '제목 없음');
//    $writer = post('writer', '작성자 없음');
//
//    echo '<br>';
//    echo '*공지글 여부 : ' . $isNotice . '<br>';
//    echo '*제목 : ' . $subject . '<br>';
//    echo '*글작성자 : ' . $writer . '<br>';
//    for ($i=0; $i<count($options); $i++) {
//        echo '*옵션#' . ($i + 1) . ':' . $options[$i] . '<br>';
//    }
//    //echo 'subject=' . $_POST['subject'];
//    //echo 'writer=' . $_POST['writer'];
//
//    // 데이터베이스 연결
////    const DB_DRIVER = 'mysql';
////    const DB_HOST = 'localhost';
////    const DB_NAME = 'myhome';
////    const DB_LOGIN_ID = 'myhome';
////    const DB_LOGIN_PWD = 'myhome1234';
////
////    $dbConnectionString = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' .DB_NAME . ';charset=utf8';
////    $db = new PDO($dbConnectionString, DB_LOGIN_ID, DB_LOGIN_PWD);
////    $stmt = $db -> prepare("INSERT INTO board(idx, subject, writer) VALUES ('". $subject ."' , '". $writer ."')"); // 이러한 방식은 인젝션 위험이 있다.
////    $stmt = $db -> prepare("INSERT INTO board(subject, writer) VALUES (:subject, :writer)");
//    $stmt = $db -> prepare("INSERT INTO" . $_board_options["tableName"] . " (subject ,writer) VALUES (:subject, :writer)");
//    $stmt -> bindValue(':subject', $subject);
//    $stmt -> bindValue(':writer', $writer);
//    $stmt -> execute();
//
//    //$stmt -> bindParam(':subject', $subject);
//    //$stmt -> bindParam(':writer', $writer);
//    //$stmt -> execute();
//    //$subject = $subject . '#';
//    //$writer = $writer . '#';
//
//    $db = null;
//
//(물음표)>-->
<!---->
<!--<script>-->
<!--    location.href='/board/'-->
<!--</script>-->

<?php

$subject = post('subject', '제목 없음');
$writer = post('writer', '작성자 없음');
$pwd = post('pwd');
$content = post('content');


$stmt = $db->prepare("INSERT INTO " . $_board_options["tableName"] . " (subject, writer, pwd, content) VALUES (:subject, :writer, :pwd, :content)");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':pwd', $pwd);
$stmt->bindValue(':content', $content);
$stmt->execute();

$db = null;
?>

<script>
    location.href='<?=$_board_options["listPage"]?>';
</script>