<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/icon.png">
    <meta charset="utf-8">
    <title>DDSecurity</title>
  </head>
  <body>
    <div class="body"></div>
    		<div class="grad"></div>
    		<div class="header">
    			<div>DD<span>Systems</span></div>
    		</div>
    		<br>
        <form action="connect.php" method="post">
      		<div class="login">
            <?php
            if (isset($_GET['error'])) { ?>
              <p style="color:red;height:25px;width:300px;margin-left:50px;border-radius:5px;" class="error"> <?php echo $_GET['error']; ?> </p>
          <?php  } ?>
      				<input type="text" placeholder="Username" name="username"><br>
      				<input type="password" placeholder="password" name="password"><br>
      				<input type="submit" value="Login">
              <p>Get <a href="sign.php">Register</a></p>
      		</div>
        </form>
  </body>
</html>
