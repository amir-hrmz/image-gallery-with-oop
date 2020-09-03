<?php
require_once 'admin/includes/init.php';

if (@$_POST['submit'])
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $User=new User();
    $user_found = $User->verify_user($username,$password);

    if ($user_found)
    {
        $session->login();
        header("Location:admin/index.php");
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="admin/css/style.css">
    <title>Document</title>
</head>
<body>

</body>
</html>
<div class="login">
    <form action="" method="post">
        <input type="text" name="username" placeholder="نام کاربری خود را وارد کنید"><br>
        <input type="password" name="password" placeholder=" رمز عبور خود را وارد کنید"><br>
        <input type="submit" name="submit" class="btnsubmit" value="ورود"><br>
    </form>
</div>
