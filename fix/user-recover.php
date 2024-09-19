<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "../db/db.php";

    if (isset($_POST['username']) && isset($_POST['nwusername'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $id = $_SESSION['id'];
        $username = validate($_POST['username']);
        $nwusername = validate($_POST['nwusername']);

        if(empty($username)){
            header("Location: ../page/setting.php?error=Old Username is required");
            exit();
        } else if(empty($nwusername)){
            header("Location: ../page/setting.php?error=New Username is required");
            exit();
        } else {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT username FROM user WHERE id=? AND username=?");
            $stmt->bind_param("is", $id, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows === 1){
                $stmt = $conn->prepare("UPDATE user SET username=? WHERE id=?");
                $stmt->bind_param("si", $nwusername, $id);
                $stmt->execute();

                header("Location: ../page/setting.php?success=Your username has been changed successfully");
                exit();
            } else {
                header("Location: ../page/setting.php?error=Incorrect username");
                exit();
            }
        }
    } else {
        header("Location: ../page/setting.php?error=All fields are required");
        exit();
    }
} else {
    header("Location: ../page/setting.php");
    exit();
}
?>
