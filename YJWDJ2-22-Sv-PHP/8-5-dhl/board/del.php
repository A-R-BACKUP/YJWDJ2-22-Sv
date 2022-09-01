<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/_inc/common.php";?>
<?php
$idx = get('idx', '0');
if($idx == '0'){
    ?>
    <script>
        alert('잘못된 접근 입니다.');
        location.href='<?=$_board_options["listPage"]?>';
    </script>
    <?php
    return;
}
// 게시물 삭제하기
$stmt = $db->prepare("DELETE FROM " . $_board_options["tableName"] . " WHERE idx=:idx;"); // 플레이스홀드?? 바인드??
$stmt -> bindValue(':idx', $idx);
$stmt -> execute();
?>
<script>
    alert('게시물이 삭제되었습니다.');
    location.href='<?=$_board_options["listPage"]?>';
</script>

<?php
$db = null;
//
//$error = 0;
//
//$listTag = '<ul>';
//if($row = $stmt -> fetch(PDO::FETCH_BOTH)){
//    $listTag .= '<li>idx: ' . $row['idx'] . '</li>';
//    $listTag .= '<li>subject: ' . $row['subject'] . '</li>';
//    $listTag .= '<li>writer: ' . $row['writer'] . '</li>';
//} else {
//    $error += 1;
//    $listTag .= '<li>게시물이 삭제되었거나 이동되었을 수 있습니다.</li>';
//}
//$listTag .= '</ul>';
?>