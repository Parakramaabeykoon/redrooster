<?php
// Include the database connection
include_once("includes/dbh.inc.php");

// Check if the product ID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
    $stmt->bind_param('i', $product_id);

    if ($stmt->execute()) {
        header("Location:cart_2.php?alert=deleted");
    } else {
        echo "Error deleting cart item.";
    }
} else {
    echo "Invalid cart item ID.";
}

// Close the database connection
$conn->close();
?>
