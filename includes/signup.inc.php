<?php

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname =$_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $user_password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

    include_once('dbh.inc.php');

    $sql = "INSERT INTO customer (first_name, last_name, email, password,address,mobile)
    VALUES ('$fname', '$lname', '$email' ,'$hashed_password','$address','$mobile')";

    if ($conn->query($sql) === TRUE) {
        // Start a session
        session_start();

        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['fname'] = $fname;            
        $_SESSION['lname'] = $lname;
        header('Location:../index.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
else{
    header('Location:../signup.html');
}
?>