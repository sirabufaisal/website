<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>التسجيل</title>
    <link rel="stylesheet" href="../css/css.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $id = stripslashes($_REQUEST['id']);
        $id = mysqli_real_escape_string($con, $id);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime, id)
                     VALUES ('$username', '$password', '$email', '$create_datetime', '$id')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
    <div class="hr3-login"></div>
            <img src="../img/logo.png" class="logo-login">
        <h1 class="login-title">التسجيل</h1>
        <input type="tel" class="login-input-id" name="id" placeholder="رقم الهوية" required />
        <input type="text" class="login-input-user" name="username" placeholder="اسم المستخدم" required />
        <input type="text" class="login-input-email" name="email" placeholder="البريد الألكتروني">
        <input type="password" class="login-input-password" name="password" placeholder="الرقم السري">
        <input type="submit" name="submit" value="تسجيل" class="reg-button">
        <p class="link-reg">لديك حساب بالفعل ؟ <a href="login.php">سجل دخول هنا</a></p>
    </form>
    <div class="sidebar-login"></div>
        <div class="sidebar-login-icons">
            <button type="button" class="home-login" onclick='location.href=("registration.php")'>
                <i class='bx bx-home' ></i>
               </button>
            
            <button type="button" class="me-login" onclick='location.href=("registration.php")'>
                <i class='bx bx-directions' ></i>
               </button>
               <button type="button" class="account-login" onclick='location.href=("registration.php")'>
                <i class='bx bxs-user-account' ></i>
               </button>
             
            <div class="sidebar-login-text">
              
            </div>
        </div>
<?php
    }
?>
</body>
</html>
