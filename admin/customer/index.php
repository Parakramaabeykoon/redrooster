<?php
// Include the database connection
include_once("../../includes/dbh.inc.php");

// Fetch orders from the database
$sql = "SELECT * FROM `orders`";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer's Orders</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<a href="../index.php" style="color:white">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
    </svg>
</a>
    <main class="table" id="customers_table">

        <section class="table__header">
            <h1>Customer's Orders</h1>
            <!-- Add your search and export functionality here -->
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Product ID</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>Customer ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result !== false && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['order_id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td><img src='../../" . $row['product_image_url'] . "' alt=''></td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>" . $row['total'] . "</td>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['method'] . "</td>";
                            echo "<td>" . $row['customer_id'] . "</td>";
                            echo "<td> <input type='submit' value='" . $row['status'] . "' onclick='updateOrderStatus(" . $row['order_id'] . ")'></td>";
                            echo "<script>
                            function updateOrderStatus(orderId) {
                                // Send AJAX request to update order status
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'update_status.php', true);
                                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        // Refresh the page after successful update
                                        location.reload();
                                    } else {
                                        console.log('Failed to update order status');
                                    }
                                };
                                xhr.send('orderId=' + orderId);
                            }
                        </script>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No orders found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <script src="script.js"></script>
</body>

</html>