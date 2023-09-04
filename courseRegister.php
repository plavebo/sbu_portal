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
        <section class="register">
            <h2>수강신청</h2>
<?php
    include './dbconn.php';
    $id = $_SESSION['user_id'];

    $query = "SELECT stdNum FROM loginfo WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $stdNum = $row["stdNum"];

    $query = "SELECT grade FROM academy where stdNum = '$stdNum'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $aGrade = $row["grade"];
    
    echo "<p>신청 학점: ". $aGrade . "<p>";

    $query = "SELECT * FROM lecture";
    $result = mysqli_query($connect, $query);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        // 강의 목록 출력
        echo "<table>";
        echo "<tr><th>강의 ID</th><th>강의명</th><th>학년</th><th>요일</th><th>강의 시간</th><th>강의실</th><th>학점</th><th>신청</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["lecId"] . "</td>";
            echo "<td>" . $row["lecName"] . "</td>";
            echo "<td>" . $row["schoolyear"] . "</td>";
            echo "<td>" . $row["daysofweek"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>" . $row["room"] . "</td>";
            echo "<td>" . $row["grade"] . "</td>";
            echo "<td>";
            echo "<form action='./register.php' method='post'>";
            echo "<input type='hidden' name='lecId' value='" . $row["lecId"] . "'>";
            echo "<button type='submit'>신청</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "강의가 없습니다.";
    }

    ?>
        </section>
    </article>

    <footer>
        <p>산보대학교 | 김서이 | 20220536</p>
    </footer>
</body>

</html>