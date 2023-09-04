<?php
session_start();
//    error_reporting(E_ALL);
//    ini_set("display_errors", 1);

    include './dbconn.php';

    $id = $_SESSION['user_id'];

    $query="SELECT stdNum from logInfo where id = '$id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $stdnum = $row['stdNum'];

    $query="DELETE from logInfo where id = '$id'";
    mysqli_query($connect, $query);
    $query="DELETE from info where stdNum = '$stdnum'";
    mysqli_query($connect, $query);
    $query="DELETE from academy where stdNum = '$stdnum'";
    mysqli_query($connect, $query);

    echo"
    <script>
    location.href='./logout.php';
    </script>
    ";

 ?>