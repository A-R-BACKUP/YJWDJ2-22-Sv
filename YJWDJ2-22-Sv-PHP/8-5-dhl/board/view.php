<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/_inc/common.php";?>
<?php
$idx = get('idx', '0');
if($idx == '0'){
    ?>
    <script>
        alert('잘못된 접근 입니다.');
        location.href='/board/';
    </script>
    <?php
    return;
}

// 게시물 조회수 증가 시키기
$stmt = $db->prepare("UPDATE " . $_board_options["tableName"] . " SET viewCount=viewCount+1 WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

// 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$error = 0;
$listTag = '<ul>';
if($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $listTag .= '<li>고유번호: ' . $row['idx'] . '</li>';
    $listTag .= '<li>조회수:' . $row['viewCount'] . '</li>';
    $listTag .= '<li>제목:' . $row['subject'] . '</li>';
    $listTag .= '<li>작성자:' . $row['writer'] . '</li>';
    $listTag .= '<li>내용:' . ($row['content']) . '</li>';
} else {
    $error += 1;
    $listTag .= '<li>게시물이 삭제되었거나 이동되었을 수 있습니다.</li>';
}
$listTag .= '</ul>';

$db = null;
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$_board_options["name"]?> 상세보기</title>
    <script>
        function del() {
            if(confirm('정말 삭제하시겠습니까?')) {
                location.href="<?=$_board_options["delPage"]?>?idx=<?=$idx?>";
            }
        }
    </script>
</head>
<body>
<h1><?=$_board_options["name"]?> 상세보기</h1>
<?= $listTag ?>
<div>
    <a href="/board/">목록</a>
    <?php if($error == 0) {?>
        <a href="<?=$_board_options["modifyPage"]?>?idx=<?=$idx?>">수정</a>
        <a href="#" onclick="del();return false;" >삭제</a>
    <?php } ?>
</div>
</body>
</html>
