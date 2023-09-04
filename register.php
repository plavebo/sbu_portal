<?php
session_start();

include './dbconn.php';

// 학번과 강의 코드 가져오기
$id = $_SESSION['user_id'];  // 세션에서 아이디 가져오기
$lecId = $_POST['lecId'];  // POST 데이터에서 강의 코드 가져오기

// loginfo 테이블에서 학번 가져오기
$query = "SELECT stdNum FROM loginfo WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$stdNum = $row["stdNum"];

// stdLec 테이블에서 중복 체크
$query = "SELECT * FROM stdLec WHERE stdNum = '$stdNum' AND lecId = '$lecId'";
$result = mysqli_query($connect, $query);
$numRows = mysqli_num_rows($result);

if ($numRows > 0) {
    echo "<script>alert('이미 신청된 강의입니다.');</script>";
    echo "<script>window.location.href = 'courseRegister.php';</script>";
} else {
    // 선택한 강의 요일과 시간 가져오기
    $query = "SELECT daysofweek, time, grade FROM lecture WHERE lecId = '$lecId'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $selectedDayOfWeek = $row["daysofweek"];
    $selectedTime = $row["time"];
    $selectedGrade = $row["grade"];

    // 이미 신청한 강의 요일과 시간 가져오기
    $query = "SELECT l.daysofweek, l.time, a.grade FROM stdLec sl
                INNER JOIN lecture l ON sl.lecId = l.lecId
                WHERE sl.stdNum = '$stdNum'";
    $result = mysqli_query($connect, $query);

    $canRegister = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $existingDayOfWeek = $row["daysofweek"];
        $existingTime = $row["time"];
        
        // 요일이 겹치는지 확인
        if ($selectedDayOfWeek === $existingDayOfWeek) {
            // 시간이 겹치는지 확인
            if (checkTimeConflict($selectedTime, $existingTime)) {
                $canRegister = false;
                break;
            }
        }
    }

    if ($canRegister) {
        // academy의 학점 가져오기
        $query = "SELECT grade FROM academy WHERE stdNum = '$stdNum'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        $academyGrade = $row["grade"];

        // 총학점과 신청한 강의의 학점을 비교하여 19학점을 초과하는지 확인
        if ($selectedGrade + $academyGrade > 19) {
            echo "<script>alert('총 학점이 19학점을 초과하여 수강신청이 불가능합니다.');</script>";
        } else {
            // stdLec 테이블에 데이터 추가
            $query = "INSERT INTO stdLec (stdNum, lecId) VALUES ('$stdNum', '$lecId')";
            if ($connect->query($query) === TRUE) {
                $query = "UPDATE academy SET grade = grade + $selectedGrade WHERE stdNum = '$stdNum'";
                mysqli_query($connect, $query);
                echo "<script>alert('수강신청이 완료되었습니다.');</script>";
            } else {
                echo "<script>alert('수강신청에 실패하였습니다.');</script>";
            }
        }
    } else {
        echo "<script>alert('강의 시간이 겹칩니다.');</script>";
    }
    echo "<script>window.location.href = 'courseRegister.php';</script>";
}

function checkTimeConflict($time1, $time2) {
    // 시간 문자열을 시간 범위로 분리
    $time1Parts = explode('-', $time1);
    $time2Parts = explode('-', $time2);

    // 시간 범위의 시작과 끝 시간 추출
    $time1Start = strtotime($time1Parts[0]);
    $time1End = strtotime($time1Parts[1]);
    $time2Start = strtotime($time2Parts[0]);
    $time2End = strtotime($time2Parts[1]);

    // 시간이 겹치는지 확인
    if (($time1Start >= $time2Start && $time1Start <= $time2End) || ($time1End >= $time2Start && $time1End <= $time2End)) {
        return true; // 시간이 겹침
    } else {
        return false; // 시간이 겹치지 않음
    }
}

// DB 연결 종료
$connect->close();
?>
