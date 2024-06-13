<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery Data</title>
  <style>
    body{
      background-color:green;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      background-color:aquamarine;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
<a href="index.php" style="color:#111;">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
    </svg>
</a>
  <h2>Delivery Data</h2>
  <table>
    <thead>
      <tr>
        <th>Delivery ID</th>
        <th>Order ID</th>
        <th>Rider Name</th>
        <th>Customer ID</th>
        <th>Delivery Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Include database connection
      include_once('../includes/dbh.inc.php');

      // SQL command to fetch data from the 'delivers' table
      $sql_select_deliveries = "SELECT deliver_id, order_id, rider_name, customer_id, delivery_date FROM delivers";
      $result_deliveries = $conn->query($sql_select_deliveries);

      // Check if there are any results
      if ($result_deliveries->num_rows > 0) {
          // Output data of each row
          while ($row = $result_deliveries->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["deliver_id"] . "</td>";
              echo "<td>" . $row["order_id"] . "</td>";
              echo "<td>" . $row["rider_name"] . "</td>";
              echo "<td>" . $row["customer_id"] . "</td>";
              echo "<td>" . $row["delivery_date"] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No deliveries found</td></tr>";
      }

      // Close the database connection
      $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>
