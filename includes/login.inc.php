<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    include_once('dbh.inc.php');
    
    $query = "SELECT * FROM customer WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error getting result: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $hashed_password = $row['password'];
        if (password_verify($user_password, $hashed_password)) {
            // Start a session
            session_start();
            // Set session variables
            $_SESSION['email'] = $row['email'];            
            $_SESSION['fname'] = $row['fname'];            
            $_SESSION['lname'] = $row['lname'];

            if ($row['email'] == "admin@email.com") {
                header('Location:../admin/index.php');
            }
            else{
                header('Location:../index.php');
            }

        } else {
            header('Location:../404php');
        }
    } else {
        header('Location:../404.php?error=invalidpassword');
        }
        
        mysqli_stmt_close($stmt);
    }

else{
    header('Location:../404.php?error=emailnull');
}
?>