<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
include '../db/db.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/icon.png">
    <script src="https://kit.fontawesome.com/7cf3fe948b.js" crossorigin="anonymous"></script>
    <title>DDSecurity | NVR</title>
    <link rel="stylesheet" href="/css/nvr.css">
</head>
<body>
    <div class="navbar">
        <h1>DDSecurity</h1>
        <div class="menu-icon" id="menu-icon">☰</div>
    </div>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="/login.php"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="network.php"><i class="fas fa-network-wired"></i> Network</a></li>
            <li><a href="nvr.php"><i class="fas fa-server"></i> NVR</a></li>
            <li><a href="setting.php"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="post">
            <h2><i class="fas fa-server"></i> NVR</h2>
            <div class="box">
              <nav>
                <ul>
                  <li><a href="nvr.php"><i class="fas fa-server"></i> NVR Server</a></li>
                  <li><a href="/nvr/cctv.php"><i class="fa-solid fa-video"></i> Camera</a></li>
                </ul>
              </nav>
            </div>
            <div class="inbox">
              <iframe src="/fix/nvr.html" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
    <script src="/scripts.js"></script>
</body>
</html>

<?php
}else{
     header("Location: /index.php");
     exit();
}
 ?>
