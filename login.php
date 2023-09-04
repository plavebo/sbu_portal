<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

include './dbconn.php';

function password_verify($pwd, $storedPwd) {
    if($pwd === $storedPwd) {
        return true;
    } else {
        return false;
    }
}

$id = $_POST['user_id'];
$pwd = $_POST['user_password'];

$query = "SELECT * FROM logInfo WHERE id = '$id'";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

if (!$num) {
    ?>
<script>
alert('해당 아이디가 없습니다.\n회원가입을 먼저 해주세요.');
location.href = './join.php';
</script>
<?php
} else {
    $row = mysqli_fetch_assoc($result);
    $hashedPwd = $row['pwd'];

    if (password_verify($pwd, $hashedPwd)) {
        $_SESSION['user_id'] = $id;
        ?>
<script>
location.href = './main.php';
</script>
<?php
    } else {
        ?>
<script>
alert('비밀번호가 일치하지 않습니다.');
location.href = './loginForm.php';
</script>
<?php
    }
}

mysqli_close($connect);
?>