<?php
session_start();
?>
<html>

<head>
    <meta charset=UTF-8>
    <title>산보대학교 포탈</title>
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
        <section class="info-from">
            <p>
            <h2>내 정보</h2>
            </p>
            <?php
            include './dbconn.php';

            

            $id = $_SESSION['user_id']; 
            $query = "SELECT i.stdNum, i.stdName, i.BDay, i.gender, a.major, a.sem, a.admissionYear
                    FROM info i
                    JOIN academy a ON i.stdNum = a.stdNum
                    WHERE i.stdNum IN (SELECT stdNum FROM loginfo WHERE id = '$id')
                    ORDER BY i.stdNum";
            $result = mysqli_query($connect, $query);

            // HTML 테이블 생성 및 데이터 출력
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $stdNum = $row['stdNum'];
                $stdName = $row['stdName'];
                $BDay = $row['BDay'];
                $gender = $row['gender'];
                $major = $row['major'];
                $sem = $row['sem'];
                $admissionYear = $row['admissionYear'];
                echo "<form action='./updating.php' name='update-form' method='post'>
                    <label>학번:</label> ".$stdNum."<br><br>
                    <label>이름:</label> <input type='text' name='stdName' value='".$stdName."'><br><br>
                    <label>생년월일:</label> <input type='text' name='BDay' value='".$BDay."'><br><br>
                    <label>성별:</label> <input type='text' name='gender' value='".$gender."'><br><br>
                    <label>전공:</label> <input type='text' name='major' value='".$major."'><br><br>
                    <label>학기:</label> <input type='text' name='sem' value='".$sem."'><br><br>
                    <label>입학연도:</label> <input type='text' name='admissionYear' value='".$admissionYear."'><br><br>
                    <input type='hidden' name='stdNum' value='".$stdNum."'>
                    <section class='buttons'>
                    <button type='submit'>정보 수정</button>
                    <button type='button' onclick='location.href='./delete.php''>정보 삭제</button>
                    </section>
                    </form>";
            ?>

            <?php
            } else {
                echo "No data found.";
            }

            // MySQL 연결 종료
            mysqli_close($connect);
        ?>
    </article>
    <footer>
        <p>산보대학교 | 김서이 | 20220536</p>
    </footer>
</body>

</html>