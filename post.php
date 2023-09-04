<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

include './dbconn.php';

if (isset($_SESSION['user_id'])) {
    header('Location: main.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['user_id'];
    $password = $_POST['user_password'];
    $name = $_POST['user_name'];
    $stdNum = $_POST['std_num'];
    $major = $_POST['major'];
    $gender = $_POST['gender'];
    $bday = $_POST['bday'];
    $sem = $_POST['semester'];
    $admissionYear = $_POST['admission_year'].'-'.$_POST['admission_date'];

    if (isset($_POST['check_button'])) {
        // 중복 아이디 확인
        $query = "SELECT * FROM logInfo WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        $num = mysqli_num_rows($result);

        if ($num) {
            echo '<span class="error">이미 존재하는 아이디입니다.</span>';
        } else {
            echo '<span class="success">사용 가능한 아이디입니다.</span>';
        }
        exit();
    }
    
    // 회원가입 처리
        $query = "INSERT INTO logInfo (stdNum, stdName, id, pwd) VALUES ('$stdNum', '$name', '$id', '$password')";
        mysqli_query($connect, $query);

        $query = "INSERT INTO info (stdNum, stdName, BDay, gender) VALUES ('$stdNum', '$name', '$bday', '$gender')";
        mysqli_query($connect, $query);

        $query = "INSERT INTO academy (stdNum, major, stdName, sem, admissionYear) VALUES ('$stdNum', '$major', '$name', '$sem', '$admissionYear')";
        mysqli_query($connect, $query);

    $_SESSION['user_id'] = $id;
    header('Location: main.php');
    exit();
}

mysqli_close($connect);
?>