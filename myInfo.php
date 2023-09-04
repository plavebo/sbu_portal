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
        ?>
            <table>
                <tr>
                    <th>학번</th>
                    <th>학생이름</th>
                    <th>생년월일</th>
                    <th>성별</th>
                    <th>전공</th>
                    <th>이수학기</th>
                    <th>입학일자</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['stdNum']."</td>
                            <td>".$row['stdName']."</td>
                            <td>".$row['BDay']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['major']."</td>
                            <td>".$row['sem']."</td>
                            <td>".$row['admissionYear']."</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No data found.";
            }

            // MySQL 연결 종료
            mysqli_close($connect);
        ?>
        </section>
        <section class="buttons">
            <button type="button" onclick="location.href='./update.php'">정보 수정</button>
            <button type="button" onclick="location.href='./delete.php'">정보 삭제</button>
        </section>
    </article>
    <footer>
        <p>산보대학교 | 김서이 | 20220536</p>
    </footer>
</body>

</html>