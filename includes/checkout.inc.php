<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or perform other actions
    header("Location: login/login.html");
    exit();
}

$email = $_SESSION['email'];

// Include the database connection
include_once("dbh.inc.php");

// Retrieve customer_id based on email
$sqlcustomerid = "SELECT customer_id FROM customer WHERE email = '$email'";
$result_customerid = $conn->query($sqlcustomerid);

if ($result_customerid !== false && $result_customerid->num_rows > 0) {
    $row_customerid = $result_customerid->fetch_assoc();
    $customer_id = $row_customerid['customer_id'];
} else {
    echo "Error retrieving customer ID: " . $conn->error;
    exit();
}

// Retrieve cart details based on email
$sqlcart = "SELECT * FROM cart WHERE email = '$email'";
$result_sqlcart = $conn->query($sqlcart);

if ($result_sqlcart !== false && $result_sqlcart->num_rows > 0) {
    while ($row_sqlcart = $result_sqlcart->fetch_assoc()) {
        $product_name = $row_sqlcart['product_name'];
        $product_image_url = $row_sqlcart['product_image_url'];
        $price = $row_sqlcart['price'];
        $quantity = $row_sqlcart['quantity'];
        $total = $row_sqlcart['total'];
        $product_id = $row_sqlcart['id'];
        $method = $_POST['paymentMethod'];
        echo $method;

        // Insert into orders table
        $sql_insert_order = "INSERT INTO `orders` 
                     (`product_name`, `product_image_url`, `price`, `quantity`, `total`, `product_id`, `date`, `status`, `customer_id`, `method`) 
                     VALUES (
                        '$product_name',
                        '$product_image_url',
                        $price,
                        $quantity,
                        $total,
                        $product_id,
                        NOW(),
                        'pending',
                        $customer_id,
                        '$method'
                     )";
        echo $sql_insert_order;
        if ($conn->query($sql_insert_order) === TRUE) {
            // Clear cart after successful order insertion
            $sql_clear_cart = "DELETE FROM cart WHERE email = '$email'";
            $conn->query($sql_clear_cart);
        } else {
            echo "Error inserting order: " . $conn->error;
        }
    }
    header("Location:../shop_4.php?alert=ordersuccess");
} else {
    echo "No cart items found for the given email.";
}

// Close the database connection
$conn->close();
  // Uncomment this line if you want to redirect after processing
?>
