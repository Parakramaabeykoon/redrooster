<?php
session_start();


if (!isset($_SESSION['email'])) {
    
    header("Location: ../login/login.html");
    exit();   
}
if ($_SESSION['email'] != "admin@email.com") {
    header("Location: ../404.php?error=notadmin");
}
include_once('../includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Red Rooster</h1>
        </div>
        <ul>
            <li><img src="dashboard (2).png" alt="">&nbsp; <span>Admin</span> </li>
            <a href="customers.php">
            <li><img src="customer2.png" alt="">&nbsp;<span>Customer</span> </li>
            </a>
            <a href="../shop_4.php">
            <li><img src="shop2.png" alt="">&nbsp;<span>Shop</span> </li>
            </a>
            <a href="customer">
                <li><img src="payment.png" alt="">&nbsp;<span>Orders</span> </li>
            </a>
            <a href="rides.php">
                <li><img src="truck-solid.svg" style="width:50px;height:50px;" alt="">&nbsp;<span>Delivery Data</span> </li>
            </a>
            <a href="rider.orders.php">
                <li><img src="motorbike.png" style="width:50px;height:50px;" alt="">&nbsp;<span>Rider Assign</span> </li>
            </a>
          
            
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="search.png" alt=""></button>
                </div>
                <a style="margin-right:16px;" href="product add/admin_page.php" class="btn">Add Products</a>
                
                <a href="../includes/signout.inc.php" class="btn">Logout</a>
                  
                
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2194</h1>
                        <h3>Customer</h3>
                    </div>
                    <div class="icon-case">
                        <img src="customer.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>53</h1>
                        <h3>Delivery</h3>
                    </div>
                    <div class="icon-case">
                        <img src="Delivery.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Shop</h3>
                        
                    </div>
                    <div class="icon-case">
                        <img src="shop.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>350000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Selling Product</h2>
                        <a href="customer/index.php" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Date</th>
                        </tr>
                        <?php
                        $select = mysqli_query($conn, "SELECT * FROM orders LIMIT 7");
                        if ($select) {
                            while ($row = mysqli_fetch_assoc($select)) {
                                echo "<tr>";
                                echo "<td>". $row['order_id'] ."</td>";
                                echo "<td>". $row['product_name'] ."</td>";
                                echo "<td>". $row['price'] ."</td>";
                                echo "<td>". $row['quantity'] ."</td>";
                                echo "<td>". $row['date'] ."</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Customer</h2>
                        <a href="customers.php" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    <?php
                        
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        $select = mysqli_query($conn, "SELECT * FROM customer LIMIT 7");
                        if ($select) {
                            while ($row = mysqli_fetch_assoc($select)) {
                                echo "<tr>";
                                echo "<td><img src='user.png' alt='user'></td>";
                                echo "<td>". $row['first_name'] ."</td>";
                                echo "<td>". $row['last_name'] ."</td>";
                                echo "</tr>";
                            }
                        }

                    ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>