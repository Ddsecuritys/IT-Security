<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "../db/db.php";

    if (isset($_POST['email']) && isset($_POST['nwemail'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $id = $_SESSION['id'];
        $email = validate($_POST['email']);
        $nwemail = validate($_POST['nwemail']);

        if(empty($email)){
            header("Location: ../page/setting.php?error=Old Email is required");
            exit();
        } else if(empty($nwemail)){
            header("Location: ../page/setting.php?error=New Email is required");
            exit();
        } else {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("SELECT email FROM user WHERE id=? AND email=?");
            $stmt->bind_param("is", $id, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows === 1){
                $stmt = $conn->prepare("UPDATE user SET email=? WHERE id=?");
                $stmt->bind_param("si", $nwemail, $id);
                $stmt->execute();

                header("Location: ../page/setting.php?success=Your email has been changed successfully");
                exit();
            } else {
                header("Location: ../page/setting.php?error=Incorrect email");
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
