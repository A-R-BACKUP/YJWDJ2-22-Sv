<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<?php
$idx = post('idx', '0');
if($idx == '0') {
    ?>
    <script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
    <?php
    return;
}

$subject = post('subject');
$writer = post('writer');
$pwd = post('pwd');
$content = post('content');

//비밀번호 확인을 위해 게시물 가져오기
$stmt = $db->prepare("SELECT * FROM " . $_board_options["tableName"] . " WHERE idx=:idx;");
$stmt->bindValue(':idx', $idx);
$stmt->execute();

if($row = $stmt->fetch(PDO::FETCH_BOTH)){
    if($row['pwd'] != $pwd){
        ?>
        <script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>
        <?php
        return;
    }
} else {
    ?>
    <script>alert('잘못된 접근 입니다.');location.href='/board/';</script>
    <?php
    return;
}


$stmt = $db->prepare("UPDATE " . $_board_options["tableName"] . " SET subject=:subject, writer=:writer, content=:content WHERE idx=:idx;");
$stmt->bindValue(':subject', $subject);
$stmt->bindValue(':writer', $writer);
$stmt->bindValue(':content', $content);
$stmt->bindValue(':idx', $idx);
$stmt->execute();

$db = null;
?>

<script>
    location.href='<?=$_board_options["viewPage"]?>?idx=<?=$idx?>';
</script>
</head>
<body>
<h1><?=$_board_options["name"]?> 수정</h1>
<div>
    <form action="modify_ok.php?idx=<?=$idx?>" method="post">
        <input type="hidden" name="idx" value="<?=$idx?>" />
        <div>공지글</div>
        <div>
            <input type="checkbox" id="isNotice" name="isNotice" value="y" />
        </div>
        <div>제목</div>
        <div>
            <input type="text" id="subject" name="subject" value="<?=$subject?>" placeholder="제목을 입력하세요" />
        </div>
        <div>작성자</div>
        <div>
            <input type="text" id="writer" name="writer" value="<?=$writer?>" placeholder="작성자의 이름을 입력하세요" />
        </div>
        <div>옵션</div>
        <div>
            <input type="checkbox" id="options_1" name="options[]" value="제목굵게" /> 제목굵게
            <br>
            <input type="checkbox" id="options_2" name="options[]" value="제목옵션2" /> 제목옵션2
            <br>
            <input type="checkbox" id="options_3" name="options[]" value="제목옵션3" /> 제목옶션3
            <br>
        </div>
        <div>
            <input type="submit" value="전송" />
        </div>
    </form>
</div>
</body>
</html>