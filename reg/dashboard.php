<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("db.php");

?>
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/css.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
    <div class="form">
    <div class="hr3-login"></div>
            <img src="../img/logo.png" class="logo-login">
             <img src="../img/arab.png" class="human-login">
        <p class="welcomemessage">أهلا <?php echo $_SESSION['username']; ?>!</p>
        <p class="infomessage">هذه صفحة بياناتك</p>
        <p class="emailmessage"> <?php  echo $_d['email'] ?></p>
        <p><a href="logout.php">تسجيل خروج</a></p>
  
    </div>
</body>
</html>
