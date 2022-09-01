<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/_inc/common.php"; ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$_board_options["name"]?> 새글 작성</title>
    <script src="/js/func.js"></script>
    <script>
        function chkInputTypeText(selector, regex, errorMsg) {
            let ele = document.querySelector(selector);
            let value = ele.value;
            if(regex.test(value)) {
                alert(errorMsg);
                ele.focus();
                return false;
            }
            return true;d
        }
        function chkForm() {
            let options = [];
            options.push({type: 'text', selector: '#subject', regex: /^\s*$/, errorMsg: })
            // 제목 체크
            if(!chkInputTypeText('#subject', /^\s*$/, '제목을 바르게 입력하세요.')) {
                return false;
            }
            // 작성자 체크
            if(!chkInputTypeText('#writer', /^\s*$/, '작성자를 바르게 입력하세요.')) {
                return false;
            }
            // 내용 체크
            if(!chkInputTypeText('#content', /^\s*$/, '내용을 바르게 입력하세요.')) {
                return false;
            }
            // 비밀번호 체크
            if(!chkInputTypeText('#pwd', /^\D*$/, '비밀번호는 숫자만 입력하세요.')) {
                return false;
            }
            return true;
        }
        // 흑흑 다운아 고맙다........ 교수님 코드로 교체해봄

        // function chkForm() {
            //제목 체크
            // 제목의 빈칸 여부를 체크
            // 자바스크립트에서 ?. 은 뭘까용??? --> 아래의 value까지 접근하기 위해서 사용한다고 함~~~~
            // let subjectValue = document.querySelector('#subject')?.value;
            // *의 의미는 0이상의 무한개
            // /^[0123456789]?$/.test('') <-- 0~9까지만 들어갔을 경우 true임. 11, aa, cc ~~ 이런거 들어가면 무조건 false
            // /^[0-9a-zA-Z]?$/.test('') 이렇게 응용 할 수 있다.
            // /^[_a-zA-Z][_0-9a-zA-Z]*$/.test('')
            // if(/^[0123456789]?$/.test(subjectValue)){
            //     alert('제목을 바르게 입력하세요');
            //     subject.focus();
            //     return false;
            // }
            // if (subjectValue == '') {
            //     alert('제목을 입력하세요.')
            //     subject.focus();
            //     return false;
            // }
            //
            // if (subjectValue.length >= 5>) {
            //     alert('제목은 5글자 이상 입력 할 수 없습니다.')
            //     subject.focus();
            //     return false;
            // }
            // if (subjectValue.trim() == '') {
            //    alert('제목을 바르게 입력하세요.')
            //    subject.focus();
            //    return false;
            // }
        //
        //     return false;
        // }
    </script>
</head>
<body>
<h1><?=$_board_options["name"]?> 새글 작성</h1>
<div>
    <form action="<?=$_board_options["writeOkPage"]?>" method="post" onsubmit="return chkForm();">
        <div>제목</div>
        <div>
            <input type="text" id="subject" name="subject" value="" placeholder="제목을 입력하세요" maxlength="5" required/>
        </div>
        <div>작성자</div>
        <div>
            <input type="text" id="writer" name="writer" value="" placeholder="작성자의 이름을 입력하세요" />
        </div>
        <div>내용</div>
        <div>
            <textarea name="content" id="content" col="200" row="50" style="width:90%;height:200px;"></textarea>
        </div>
        <div>비밀번호</div>
        <div>
            <input type="password" id="pwd" name="pwd" value="" placeholder="비밀번호" />
        </div>
        <div>
            <input type="submit" value="전송" />
        </div>
    </form>
</div>
</body>
</html>