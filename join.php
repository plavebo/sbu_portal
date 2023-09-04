<html>

<head>
    <title>산보대학교 포탈</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <header>
        <div class="row">
            <p>
                <a class="name" href="main.php">SBU 산보대학교</a>
            </p>
        </div>
    </header>
    <article class="form">
        <section class="join-form">
            <h2>회원가입</h2>
            <form action="./post.php" name='join_form' method="post">
                <p>
                    <label for="user_id">아이디:</label>
                    <input type="text" id="user_id" name="user_id" placeholder="20자 이하/중복아닐시 확정" maxlength="20" required>
                    <button type="button" id="check_button" onclick="check_duplication();">중복확인</button>
                </p>
                <p>
                    <span id="id_message"></span>
                </p>
                <p>
                    <label for="user_password">비밀번호:</label>
                    <input type="password" id="user_password" name="user_password" placeholder="20자 이하" maxlength="20"
                        required>
                </p>
                <p>
                    <label for="check_password">비밀번호 확인:</label>
                    <input type="password" id="check_password">
                </p>
                <p>
                    <span id="password_match" style="display: none; color: green;">비밀번호가 일치합니다.</span>
                    <span id="password_mismatch" style="display: none; color: red;">비밀번호가 일치하지 않습니다.</span>
                </p>
                <p>
                    <label for="user_name">이름:</label>
                    <input type="text" id="user_name" name="user_name" required>
                </p>
                <p>
                    <label for="std_num">학번:</label>
                    <input type="text" id="std_num" name="std_num" required>
                </p>
                <p>
                    <label for="major">학과:</label>
                    <input type="text" id="major" name="major" required>
                </p>
                <p>
                    <label>성별:</label>
                    <input type="radio" id="gender_male" name="gender" value="M" required>
                    <label for="gender_male">남성</label>
                    <input type="radio" id="gender_female" name="gender" value="F" required>
                    <label for="gender_female">여성</label>
                </p>
                <p>
                    <label for="bday">생년월일:</label>
                    <input type="date" id="bday" name="bday" required>
                </p>
                <p>
                    <label for="semester">이수학기:</label>
                    <input type="text" id="semester" name="semester" placeholder="숫자만 기입 ex)3" required>
                </p>
                <p>
                    <label for="admission_year">입학일자:</label>
                    <select class="admission_year" id="admission_year" name="admission_year" required>
                        <option value="">-- 연도 --</option>
                    </select>
                    <select class="admission_date" id="admission_date" name="admission_date" required>
                        <option value="">-- 날짜 --</option>
                        <option value="03-01">3월 1일</option>
                        <option value="09-01">9월 1일</option>
                    </select>
                </p>
                <button type="button" id="submit_button" onclick="checkform();">가입하기</button>
            </form>
        </section>
    </article>
    <footer>
        <p>산보대학교 | 김서이 | 20220536</p>
    </footer>

    <script>
    var yearSelect = document.getElementById('admission_year');
    var currentYear = new Date().getFullYear();
    var id = 0;
    var pwd = 0;

    for (var year = currentYear; year >= 2000; year--) {
        var option = document.createElement('option');
        option.value = year;
        option.textContent = year + '년';
        yearSelect.appendChild(option);
    }

    var signUpButton = document.getElementById('submit_button');
    document.getElementById('check_button').addEventListener('click', function() {
        var userId = document.getElementById('user_id').value;
        var messageContainer = document.getElementById('id_message');
        var inputField = document.getElementById('user_id');

        if (userId !== '') {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;

                    if (response.includes('success')) {
                        messageContainer.innerHTML = '<span class="success">사용 가능한 아이디입니다.</span>';
                        messageContainer.classList.remove('error');
                        messageContainer.classList.add('success');
                        inputField.disabled = true;
                        id = 1;
                    } else if (response.includes('error')) {
                        messageContainer.innerHTML = '<span class="error">이미 존재하는 아이디입니다.</span>';
                        messageContainer.classList.remove('success');
                        messageContainer.classList.add('error');
                        inputField.disabled = false;
                        id = 0;
                    }
                }
            };

            xhr.open('POST', './post.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('check_button=1&user_id=' + userId);
        } else {
            messageContainer.innerHTML = '<span class="error">아이디를 입력하세요.</span>';
            messageContainer.classList.remove('success');
            messageContainer.classList.add('error');
            inputField.disabled = false;
            id = 0;
        }
    });

    var userPasswordInput = document.getElementById('user_password');
    var checkPasswordInput = document.getElementById('check_password');
    var passwordMatchMsg = document.getElementById('password_match');
    var passwordMismatchMsg = document.getElementById('password_mismatch');

    checkPasswordInput.addEventListener('input', function() {
        var userPassword = userPasswordInput.value;
        var checkPassword = checkPasswordInput.value;

        if (userPassword === checkPassword) {
            passwordMatchMsg.style.display = 'inline';
            passwordMismatchMsg.style.display = 'none';
            pwd = 1;
        } else {
            passwordMatchMsg.style.display = 'none';
            passwordMismatchMsg.style.display = 'inline';
            pwd = 0;
        }
    });

    function checkform() {
        document.join_form.user_id.disabled = false;
        if (id === 0) {
            document.join_form.user_id.focus();
            return;
        } else if (pwd === 0) {
            document.join_form.check_password.focus();
            return;
        }
        document.join_form.submit();
    };
    </script>
</body>

</html>