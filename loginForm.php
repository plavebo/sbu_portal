<html>

<head>
    <title>산보대학교 포탈</title>
    <meta charset=UTF-8>
    <link rel="stylesheet" href="main.css">
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
        <section class='login-form'>
            <h2>로그인</h2>
            <form action='./login.php' name='login_form' method='post'>
                <p>
                    <label for="user_id">아이디: </label>
                    <input type="text" id="user_id" name="user_id" required>
                </p>
                <p>
                    <label for="user_password">비밀번호: </label>
                    <input type="password" id="user_password" name="user_password" required>
                </p>
                <section class="buttons">
                    <button type="submit">로그인</button>
                    <button type="button" onclick="location.href = './join.php';">회원가입</button>
                </section>
            </form>
        </section>
    </article>
    <footer>
        <p>산보대학교 | 김서이 | 20220536</p>
    </footer>
</body>

</html>