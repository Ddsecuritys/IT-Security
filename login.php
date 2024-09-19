<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include 'db/db.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png">
    <script src="https://kit.fontawesome.com/ee68d8abc9.js" crossorigin="anonymous"></script>
    <title>DDSecurity</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="navbar">
        <h1>DDSecurity</h1>
        <div class="menu-icon" id="menu-icon">☰</div>
    </div>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="login.php"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="page/network.php"><i class="fas fa-network-wired"></i> Network</a></li>
            <li><a href="page/nvr.php"><i class="fas fa-server"></i> NVR</a></li>
            <li><a href="page/setting.php"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="page/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="post">
            <h2><i class="fas fa-user-circle"></i> Profile</h2>
            <img style="width:150px;height:150px;" src="img/icon.png" alt="">
            <p>First Name: <?php echo $_SESSION['fname']; ?></p>
            <p>Last Name: <?php echo $_SESSION['lname']; ?></p>
            <p>Username: <?php echo $_SESSION['username']; ?></p>
            <p>Email: <?php echo $_SESSION['email']; ?></p>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>

<?php
}else{
     header("Location: /index.php");
     exit();
}
 ?>
