<?php
session_start();
?>
<html>

<head>
    <meta charset=UTF-8>
    <title>산보대학교 포탈</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script>
    function toggleSchedule(monthId) {
        var schedules = document.getElementsByClassName('schedule');
        for (var i = 0; i < schedules.length; i++) {
            if (schedules[i].id === monthId) {
                schedules[i].style.display = 'block';
            } else {
                schedules[i].style.display = 'none';
            }
        }
    }

    function changeLogin(log) {
        var loginElements = document.getElementsByClassName('login');
        var logoutElements = document.getElementsByClassName('logout');
        var loginOpt = 'none';
        var logoutOpt = 'flex';
        if (log === 1) {
            loginOpt = 'flex';
            logoutOpt = 'none';
        }
        for (var i = 0; i < loginElements.length; i++) {
            loginElements[i].style.display = loginOpt;
        }
        for (var i = 0; i < logoutElements.length; i++) {
            logoutElements[i].style.display = logoutOpt;
        }
    }
    </script>
</head>

<body>
    <header>
        <div class="row">
            <nav class="logout">
                <a href="join.php">회원가입</a>
                <a href="loginForm.php">로그인</a>
            </nav>
            <nav class="login">
                <a href="myInfo.php">내정보</a>
                <a href="logout.php">로그아웃</a>
            </nav>
        </div>
        <div class="row">
            <a class="name" href="main.php">SBU 산보대학교</a>
            <nav class="login">
                <a href="./courseRegister.php">수강신청</a>
            </nav>
        </div>
    </header>

    <body>
        <article class="container">
            <section class="section">
                <h2>학사일정</h2>
                <div class="months">
                    <div class="month" onclick="toggleSchedule('march')">3월</div>
                    <div class="month" onclick="toggleSchedule('april')">4월</div>
                    <div class="month" onclick="toggleSchedule('may')">5월</div>
                    <div class="month" onclick="toggleSchedule('june')">6월</div>
                    <div class="month" onclick="toggleSchedule('july')">7월</div>
                    <div class="month" onclick="toggleSchedule('august')">8월</div>
                </div>
                <hr>

                <div id="march" class="schedule">
                    <h3>3월 학사일정</h3>
                    <table>
                        <tr>
                            <td>03월 01일</td>
                            <td>2023년 1학기 개시일</td>
                        </tr>
                        <tr>
                            <td>03월 02일</td>
                            <td>2023년 1학기 개강</td>
                        </tr>
                        <tr>
                            <td>03월 02일 ~ 4월 26일</td>
                            <td>유연학기 Term1(8주)</td>
                        </tr>
                        <tr>
                            <td>03월 02일 ~ 03월 08일</td>
                            <td>2023년 1학기 수강신청 정정</td>
                        </tr>
                        <tr>
                            <td>03월 23일 ~ 03월 29일</td>
                            <td>2023년 1학기 수강과목 취소(4주차)</td>
                        </tr>
                        <tr>
                            <td>03월 23일 ~ 4월 5일</td>
                            <td>2023년 1학기 강의 피드백 실시</td>
                        </tr>
                    </table>
                </div>

                <div id="april" class="schedule">
                    <h3>4월 학사일정</h3>
                    <table>
                        <tr>
                            <td>04월 20일 ~ 04월 26일</td>
                            <td>2023년 1학기 중간고사(8주차)</td>
                        </tr>
                        <tr>
                            <td>04월 27일 ~ 6월 21일</td>
                            <td>Term2(8주)</td>
                        </tr>
                    </table>
                </div>

                <div id="may" class="schedule">
                    <h3>5월 학사일정</h3>
                    <table>
                        <tr>
                            <td>05월 29일</td>
                            <td>대체휴일(부처님오신날)</td>
                        </tr>
                        <tr>
                            <td>05월 08일</td>
                            <td>2023년 하계 계절학기 시행 공지</td>
                        </tr>
                        <tr>
                            <td>05월 08일 ~ 05월 12일</td>
                            <td>졸업논문 제출</td>
                        </tr>
                        <tr>
                            <td>05월 15일 ~ 05월 26일</td>
                            <td>2023년 2학기 다전공 신청</td>
                        </tr>
                    </table>
                </div>

                <div id="june" class="schedule">
                    <h3>6월 학사일정</h3>
                    <table>
                        <tr>
                            <td>06월 01일 ~ 06월 29일</td>
                            <td>2023년 1학기 강의평가 실시</td>
                        </tr>
                        <tr>
                            <td>06월 01일 ~ 06월 08일</td>
                            <td>2023년 2학기 전공개방모집희망전공신청</td>
                        </tr>
                        <tr>
                            <td>06월 15일 ~ 06월 21일</td>
                            <td>2023년 1학기 기말시험</td>
                        </tr>
                        <tr>
                            <td>06월 15일 ~ 06월 29일</td>
                            <td>2023년 1학기 성적입력</td>
                        </tr>
                        <tr>
                            <td>06월 22일 ~ 08월 31일</td>
                            <td>2023년 여름방학</td>
                        </tr>
                        <tr>
                            <td>06월 23일 ~ 07월 14일</td>
                            <td>2023년 하계 계절학기</td>
                        </tr>
                        <tr>
                            <td>06월 30일 ~ 07월 05일</td>
                            <td>2023년 1학기 성적조회</td>
                        </tr>
                    </table>
                </div>

                <div id="july" class="schedule">
                    <h3>7월 학사일정</h3>
                    <table>
                        <tr>
                            <td>07월 01일 ~ 07월 05일</td>
                            <td>2023년 1학기 성적정정</td>
                        </tr>
                        <tr>
                            <td>07월 06일</td>
                            <td>2023년 1학기 성적확정</td>
                        </tr>
                        <tr>
                            <td>07월 03일 ~ 07월 07일</td>
                            <td>2023년 2학기 재입학 원서 접수</td>
                        </tr>
                        <tr>
                            <td>07월24일 ~ 07월 31일</td>
                            <td>2023년 2학기 복학신청</td>
                        </tr>
                        <tr>
                            <td>07월 24일 ~ 09월 27일</td>
                            <td>2023년 2학기 휴학신청</td>
                        </tr>
                    </table>
                </div>

                <div id="august" class="schedule">
                    <h3>8월 학사일정</h3>
                    <table>
                        <tr>
                            <td>08월 16일 ~ 08월 18일</td>
                            <td>2023년 2학기 수강신청</td>
                        </tr>
                        <tr>
                            <td>08월 01일 ~ 08월 03일</td>
                            <td>2023년 2학기 수강신청 장바구니</td>
                        </tr>
                        <tr>
                            <td>08월 18일</td>
                            <td>2023년 8월 학위수여자 졸업기준일</td>
                        </tr>
                        <tr>
                            <td>08월 21일 ~ 08월 25일</td>
                            <td>2023년 2학기 재학생 등록</td>
                        </tr>
                    </table>
                </div>
            </section>
            <section class="section">
                <h2>개인시간표</h2>
                <div class="login">
<?php
                include './dbconn.php';

                // 학번 가져오기
                $id = $_SESSION['user_id'];  // 세션에서 아이디 가져오기

                // loginfo 테이블에서 학번 가져오기
                $query = "SELECT stdNum FROM loginfo WHERE id = '$id'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);
                $stdNum = $row["stdNum"];

                // 학생의 수강한 강의 정보 가져오기
                $query = "SELECT l.lecId, l.lecName, l.daysofweek, l.time
                            FROM stdLec sl
                            INNER JOIN lecture l ON sl.lecId = l.lecId
                            WHERE sl.stdNum = '$stdNum'
                            ORDER BY FIELD(l.daysofweek, 'mon', 'tue', 'wed', 'thu', 'fri', 'sat')";
                $result = mysqli_query($connect, $query);

                // 각 요일에 해당하는 강의 정보를 저장할 배열 초기화
                $timetable = array(
                    'Monday' => array(),
                    'Tuesday' => array(),
                    'Wednesday' => array(),
                    'Thursday' => array(),
                    'Friday' => array(),
                    'Saturday' => array()
                );

                // 수강한 강의의 정보를 배열에 추가
                while ($row = mysqli_fetch_assoc($result)) {
                    $lecId = $row['lecId'];
                    $lecName = $row['lecName'];
                    $dayOfWeek = $row['daysofweek'];
                    $time = $row['time'];

                    $timetable[$dayOfWeek][] = array('lecId' => $lecId, 'lecName' => $lecName, 'time' => $time);
                }

                // 수강 목록 출력
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>Day of Week</th>';
                echo '<th>Lecture ID</th>';
                echo '<th>Lecture Name</th>';
                echo '<th>Time</th>';
                echo '</tr>';

                foreach ($timetable as $day => $courses) {
                    foreach ($courses as $course) {
                        $lecId = $course['lecId'];
                        $lecName = $course['lecName'];
                        $time = $course['time'];

                        echo '<tr>';
                        echo '<td>' . $day . '</td>';
                        echo '<td>' . $lecId . '</td>';
                        echo '<td>' . $lecName . '</td>';
                        echo '<td>' . $time . '</td>';
                        echo '</tr>';
                    }
                }

                echo '</table>';

                // DB 연결 종료
                $connect->close();
?>
                </div>
            </section>
        </article>
    </body>
    <footer>
        <p>산보대학교 | 김서이 | 20220536</p>
    </footer>
</body>

<?php
if(isset($_SESSION['user_id'])) {
?>
<script>
changeLogin(1);
</script>
<?php
} else {
?>
<script>
changeLogin(0);
</script>
<?php
}
?>

</html>