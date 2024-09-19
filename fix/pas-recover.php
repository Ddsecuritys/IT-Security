<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "../db/db.php";

if (isset($_POST['password']) && isset($_POST['nwpassword'])
    && isset($_POST['repassword'])) {

	function validate($data){
     $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

  $id = validate($_POST['id']);
	$password = validate($_POST['password']);
	$nwpassword = validate($_POST['nwpassword']);
	$repassword = validate($_POST['repassword']);

    if(empty($password)){
      header("Location: ../page/setting.php?error=Old Password is required");
	  exit();
  }else if(empty($nwpassword)){
      header("Location: ../page/setting.php?error=New Password is required");
	  exit();
  }else if($nwpassword !== $repassword){
      header("Location: ../page/setting.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$password = ($password);
    	$nwpassword = ($nwpassword);
      $id = $_SESSION['id'];

        $sql = "SELECT password FROM user WHERE id='$id' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){

        	$sql = "UPDATE user SET password='$nwpassword' WHERE id='$id'";
        	mysqli_query($conn, $sql);
        	header("Location: ../page/setting.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: ../page/setting.php?error=Incorrect password");
	        exit();
        }

    }


}else{
	header("Location: pass-recover.php");
	exit();
}

}else{
     header("Location: ../page/setting.php");
     exit();
}
