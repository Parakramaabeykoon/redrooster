<?php
// update_cart.php

include_once("includes/dbh.inc.php");

if(isset($_POST['update_cart'])) {
    // Retrieve quantities from the form
    $quantities = $_POST['quantity'];
    $productIds = $_POST['product_id'];

    // Update quantities in the database
    for ($i = 0; $i < count($productIds); $i++) {
        // Validate and sanitize inputs before updating the database
        $quantity = intval($quantities[$i]);  // Ensure it's an integer
        $productId = intval($productIds[$i]);  // Ensure it's an integer

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE `cart` SET `quantity` = ?, `total` = (`quantity` * `price`) WHERE `id` = ?");
        $stmt->bind_param("ii", $quantity, $productId);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect back to the cart page or do any other necessary action
    header("Location: cart_2.php?alert=qtyupdated");
    exit();
}
?>
