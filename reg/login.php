<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../css/css.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            
            echo "<div class='form'>
            <div class='hr3-login'></div>
            <img src='../img/logo.png' class='logo-login'>
                  <p style='font-size: 21px; color: red; text-align: center';>معلومات الحساب خاطئة.</p>
                  <p class='link-h'><a style='color:white; padding: 5px 5px 5px 5px;    border-radius: 12px 12px 12px 12px; background-color: #039703'; href='login.php'>سجل الدخول</a> مرة اخرى.</p>
                  </div>";
        }
    } else {
?>


    <form class="form" method="post" name="login">
    <div class="hr3-login"></div>
            <img src="../img/logo.png" class="logo-login">
            <!--<img src="../img/arab.png" class="human-login"-->
        <h1 class="login-title">صفحة تسجيل الدخول</h1>
        <input type="text" class="login-input-user" name="username" placeholder="اسم المستخدم" />
        <input type="password" class="login-input-password" name="password" placeholder="كلمة السر"/>
        <input type="submit" value="تسجيل الدخول" name="submit" class="login-button"/>
        <p class="link">ليس لديك حساب ؟ <a href="registration.php">سجل هنا</a></p>
  </form>
  <div class="sidebar-login"></div>
        <div class="sidebar-login-icons">
            <button type="button" class="home-login" onclick='location.href=("login.php")'>
                <i class='bx bx-home' ></i>
               </button>
            
            <button type="button" class="me-login" onclick='location.href=("login.php")'>
                <i class='bx bx-directions' ></i>
               </button>
               <button type="button" class="account-login" onclick='location.href=("login.php")'>
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
