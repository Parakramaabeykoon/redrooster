<?php
// Include the database connection
include_once("../../includes/dbh.inc.php");

if (isset($_POST['orderId'])) {
    $orderId = $_POST['orderId'];
    
    // Update the order status to 'delivery'
    $sql = "UPDATE `orders` SET `status` = 'delivery' WHERE `order_id` = $orderId";
    if ($conn->query($sql) === TRUE) {
        echo "Order status updated successfully";
    } else {
        echo "Error updating order status: " . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>