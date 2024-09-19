<?php
    session_start();
    include 'db/db.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {

      function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $id = validate($_POST['id']);
      $username = validate($_POST['username']);
      $password = validate($_POST['password']);

      if (empty($username)) {
        header("Location: index.php?error=Username is required ");
        exit();
      }
      else if(empty($password)){
        header("Location: index.php?error=Password is required ");
        exit();
      }
      else {
        //Hashing password

        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
          $row = mysqli_fetch_assoc($result);

          if ($row['username'] === $username && $row['password'] === $password) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];

            header("Location: login.php");
            exit();
          }else {
            header("Location: index.php?error=Incorect Username or Password ");
            exit();
          }

        }else {
          header("Location: index.php?error=Incorect Username or Password ");
          exit();
        }

      }

    }
