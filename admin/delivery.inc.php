<?php
// Include database connection
include_once('../includes/dbh.inc.php');

// Retrieve form data
$order_id = $_POST['order_id'];
$rider_name = $_POST['rider_name'];
$customer_id = $_POST['customer_id'];

// SQL command to insert data into the 'delivers' table
$sql_insert_delivery = "INSERT INTO delivers (order_id, rider_name, customer_id, delivery_date)
                        VALUES ('$order_id', '$rider_name', '$customer_id', CURDATE())";

// Execute the SQL command
if ($conn->query($sql_insert_delivery) === TRUE) {
    header('location:rides.php');
} else {
    echo "Error: " . $sql_insert_delivery . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>