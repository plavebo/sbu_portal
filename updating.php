<?php
include './dbconn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stdNum = $_POST["stdNum"]; // 학번
    $stdName = $_POST["stdName"]; // 이름
    $BDay = $_POST["BDay"]; // 생년월일
    $gender = $_POST["gender"]; // 성별
    $major = $_POST["major"]; // 전공
    $sem = $_POST["sem"]; // 학기
    $admissionYear = $_POST["admissionYear"]; // 입학연도

    $query = "UPDATE loginfo SET stdName = '$stdName' WHERE stdNum = $stdNum";
    mysqli_query($connect, $query);

    // info 테이블 업데이트
    $query = "UPDATE info SET stdName = '$stdName', BDay = '$BDay', gender = '$gender' WHERE stdNum = $stdNum";
    mysqli_query($connect, $query);

    // academy 테이블 업데이트
    $query = "UPDATE academy SET major = '$major', sem = $sem, admissionYear = '$admissionYear' WHERE stdNum = $stdNum";
    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='./myInfo.php';
    </script>
    ";
    exit();
}
?>