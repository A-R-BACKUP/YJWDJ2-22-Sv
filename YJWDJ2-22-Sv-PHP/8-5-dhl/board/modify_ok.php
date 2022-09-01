<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
$idx = post('idx', '0');
if($idx == '0') {
    ?>
    <script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
    <?php
    return;
}

$subject = post('subject', '제목 없음');
$writer = post('writer', '작성자 없음');

$stmt = $db->prepare("UPDATE " . $_board_options["tableName"] . " SET subject=:subject, writer=:writer WHERE idx=:idx;");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$db = null;
?>

<script>
    location.href='<?=$_board_options["viewPage"]?>?idx=<?=$idx?>';
</script>