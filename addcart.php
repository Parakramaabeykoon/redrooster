<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or perform other actions
    header("Location: login/login.html");
    exit();
}
$email=$_SESSION['email'];

// Include the database connection
include_once("includes/dbh.inc.php");

// Get values from the form submission
$productID = $_POST['product_id'];  // Assuming the hidden input is named "product_id"
$productName = $_POST['name'];  // Change 'name' to the correct input name
$productImageURL = $_POST["image"];  // You can replace this with the actual image URL
$price = $_POST['price'];  // You can replace this with the actual price
settype($price, 'int');
$quantity = 1;  // You may need to implement quantity selection in your form
$total = $price * $quantity;


// Insert data into the 'cart' table
$sql = "INSERT INTO `cart` (`id`, `product_name`, `product_image_url`, `price`, `quantity`, `total`,`email`) 
        VALUES ('$productID', '$productName', '$productImageURL', '$price', $quantity, $total,'$email')";

if ($conn->query($sql) === TRUE) {
    echo "Record added to cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

header("Location:cart_2.php");

?>
