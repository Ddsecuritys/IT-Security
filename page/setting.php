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
    <script src="https://kit.fontawesome.com/ee68d8abc9.js" crossorigin="anonymous"></script>
    <title>DDSecurity | Setting</title>
    <link rel="stylesheet" href="/css/setting.css">
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
            <h2><i class="fas fa-cog"></i> Setting</h2>
            <form class="pass" action="../fix/pas-recover.php" method="post">
              <?php
                if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php  }?>
                <?php
                  if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php  }?>
              <label>Old Password</label>
              <input type="password" name="password" placeholder="Old Password">
              <label>New Password</label>
              <input type="password" name="nwpassword" placeholder="New Password">
              <label>Confirm Password</label>
              <input type="password" name="repassword" placeholder="Confirm Password">
              <button type="submit" name="reset">Change</button>
            </form>
            <form class="pass" action="../fix/user-recover.php" method="post">
              <?php
                if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php  }?>
                <?php
                  if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php  }?>
              <label>Username</label>
              <input type="text" name="username" placeholder="Old Username">
              <label>New Username</label>
              <input type="text" name="nwusername" placeholder="New Username">
              <button type="submit" name="reset">Change</button>
            </form>
            <form class="pass" action="../fix/mail-recover.php" method="post">
              <?php
                if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php  }?>
                <?php
                  if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php  }?>
              <label>Email</label>
              <input type="email" name="email" placeholder="Old Email">
              <label>New Email</label>
              <input type="email" name="nwemail" placeholder="New Email">
              <button type="submit" name="reset">Change</button>
            </form>
            <form class="pass" action="/pas-recover.php" method="post">
              <?php
                if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php  }?>
                <?php
                  if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php  }?>
              <label>First Name</label>
              <input type="text" name="nwfname" placeholder="New First Name">
              <label>Last Name</label>
              <input type="text" name="nwfname" placeholder="New Last Name">
              <button type="submit" name="reset">Change</button>
            </form>
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
