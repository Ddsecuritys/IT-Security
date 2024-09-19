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
        <form action="db/register.php" method="post">
      		<div class="login">
              <input type="hidden" name="id" value="some_value">
              <input type="text" placeholder="First Name" name="fname"><br>
              <input type="text" placeholder="Last Name" name="lname"><br>
              <input type="text" placeholder="Email" name="email"><br>
      				<input type="text" placeholder="Username" name="username"><br>
      				<input type="password" placeholder="password" name="password"><br>
      				<input type="submit" name="submit" value="Sign Up">
              <p>Go Back <a href="index.php">Login</a></p>
      		</div>
        </form>
  </body>
</html>
