<?php

$host_name = "localhost";
$db_user_id = "root";
$db_pwd = "0000";
$db_name = "project";

$connect = new mysqli($host_name, $db_user_id, $db_pwd, $db_name);

if ($connect->connect_errno) {
    printf("Connect failed: %s\n", $connect->connect_errno);
    exit();
}
?>