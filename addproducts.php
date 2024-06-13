<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
    <!-- Your existing HTML content -->

    <!-- Add a form to submit product data to the server -->
    <form action="process_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required>

        <label for="price">Product Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label for="exp">Expiration Date:</label>
        <input type="date" name="exp" required>

        <label for="photo">Product Photo:</label>
        <input type="file" name="photo" accept="image/*" required>

        <!-- Add a submit button -->
        <input type="submit" value="Add Product">
    </form>

    <!-- Your remaining HTML content -->

</body>
</html>
