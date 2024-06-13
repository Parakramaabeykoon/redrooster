<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rider</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background:url(../login/bg.jpg.jpg);
    }
    .customers-box {
      background-color: #ffffff;
      border-radius: 8px;
      padding: 20px 100px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h2 {
      color: #333333;
    }
    form {
      display: inline-block;
      text-align: left;
    }
    label {
      display: block;
      margin-bottom: 8px;
      color: #555555;
    }
    select {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #cccccc;
      margin-bottom: 16px;
      box-sizing: border-box;
    }
    input[type="submit"] ,button {
      background-color: #007bff;
      color: #ffffff;
      border: none;
      padding: 12px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="customers-box">
    <h2>My All Tasks</h2>
    <form action="delivery.inc.php" method="post">
    <?php 
    include_once('../includes/dbh.inc.php');
    ?>

    <label for="order_id">Order ID</label>
    <select name="order_id" id="order_id">
        <?php 
        $sqlorder_id = "SELECT order_id FROM orders;";
        $result_order_id = $conn->query($sqlorder_id);
        
        if ($result_order_id) {
            while ($row_order_id = $result_order_id->fetch_assoc()) {
                echo '<option value="' . $row_order_id['order_id'] . '">' . $row_order_id['order_id'] . '</option>';
            }
            $result_order_id->free();
        } else {
            echo "Error executing the query: " . $conn->error;
        }
        ?>
        <option value="order_id">Order ID</option>
    </select><br><br>

    <label for="rider_name">Rider Name</label>
    <select name="rider_name" id="rider_name">
        <?php 
        // Assuming delivery_staff is the table containing rider information
        $sql_rider_names = "SELECT Name FROM delivery_staff;";
        $result_rider_names = $conn->query($sql_rider_names);
        
        if ($result_rider_names) {
            while ($row_rider_name = $result_rider_names->fetch_assoc()) {
                echo '<option value="' . $row_rider_name['Name'] . '">' . $row_rider_name['Name'] . '</option>';
            }
            $result_rider_names->free();
        } else {
            echo "Error executing the query: " . $conn->error;
        }
        ?>
        <option value="rider_name">Rider Name</option>
    </select><br><br>

    <label for="customer_id">Customer ID</label>
    <select name="customer_id" id="customer_id">
        <?php 
        // Assuming "customer" is the table containing customer information
        $sql_customer_ids = "SELECT customer_id FROM customer;";
        $result_customer_ids = $conn->query($sql_customer_ids);
        
        if ($result_customer_ids) {
            while ($row_customer_id = $result_customer_ids->fetch_assoc()) {
                echo '<option value="' . $row_customer_id['customer_id'] . '">' . $row_customer_id['customer_id'] . '</option>';
            }
            $result_customer_ids->free();
        } else {
            echo "Error executing the query: " . $conn->error;
        }
        ?>
        <option value="customer_id">Customer ID</option>
    </select><br><br>
    <input type="submit" value="Submit">
    <br><br>
    <a href="rides.php"><button>Delivery data</button></a>
    </form>
  </div>
</body>
</html>
