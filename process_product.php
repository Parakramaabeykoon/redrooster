<?php
include_once('includes/dbh.inc.php');
// Include your database connection code here
// For example, include a file with database connection details

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $expirationDate = $_POST['exp'];

    // File upload handling
    $photoUploadDirectory = "uploads/"; // Specify your upload directory path
    $photoFileName = basename($_FILES['photo']['name']);
    $photoFilePath = $photoUploadDirectory . $photoFileName;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoFilePath)) {
        // File upload successful, proceed with database insertion

        // Insert data into the database (modify as needed based on your database structure)
        // Use prepared statements to prevent SQL injection

        // Example (replace with your database connection code):
        

        $stmt = $conn->prepare("INSERT INTO products (name, price, exp, photo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdsb", $productName, $productPrice, $expirationDate, $photoFilePath);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect or display a success message after processing
        header("Location: success_product_page.php");
        exit();
    } else {
        // File upload failed
        echo "Error uploading file.";
    }
}
?>
