<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    include '../db/db.php';

    // Check if the 'url' parameter is set
if (isset($_GET['url'])) {
    // Decode the URL parameter
    $url = urldecode($_GET['url']);
} else {
    // Default URL if no parameter is provided
    $url = 'http://ring.com/';
}


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
            <li><a href="#"><i class="fas fa-network-wired"></i> Network</a></li>
            <li><a href="/page/nvr.php"><i class="fas fa-server"></i> NVR</a></li>
            <li><a href="/page/setting.php"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="post">
            <h2><i class="fas fa-server"></i> NVR</h2>
            <div class="box">
              <nav>
                <ul>
                  <li><i class="fas fa-server"></i> Hikkvision
                    <ul>
                      <li><i class="fas fa-server"></i> <a href="#">Server</a></li>
                      <li><i class="fa-solid fa-video"></i> <a href="#">Camera</a></li>
                    </ul>
                  </li>
                  <li><i class="fas fa-server"></i> Watchdogs
                    <ul>
                      <li><i class="fas fa-server"></i> <a href="#">Server</a></li>
                      <li><i class="fa-solid fa-video"></i> <a href="#">Camera</a></li>
                    </ul>
                  </li>
                  <li><i class="fas fa-server"></i> Ring
                    <ul>
                      <li><i class="fas fa-server"></i> <a href="#">Server</a></li>
                      <li><i class="fa-solid fa-video"></i> <a href="#">Camera</a></li>
                    </ul>
                  </li>
                  <li><i class="fas fa-server"></i> Hikkvision
                    <ul>
                      <li><i class="fas fa-server"></i> <a href="#">Server</a></li>
                      <li><i class="fa-solid fa-video"></i> <a href="#">Camera</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="inbox">
              <iframe src="<?php echo htmlspecialchars($url); ?>" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
    <script src="/scripts.js"></script>
</body>
</html>

<?php
} else {
    header("Location: /index.php");
    exit();
}
?>
