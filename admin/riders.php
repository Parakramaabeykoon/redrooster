<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/rider.style.css">
  <title>Rider</title>
  <style>
    
  </style>
</head>
<body>

  <div class="customers-box">
    <h2 style="color: balck;">My all task</h2>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">Rider_id.</th>
          <th class="text-center">customer name </th>
          <th class="text-center">Address</th>
         <th class="text-center">Contact Number</th>

        </tr>
      </thead>
      <tbody>
      <?php
      
      include_once("../includes/dbh.inc.php");

      $sql = "SELECT * FROM delivery_staff;";
      
      $result = $conn->query($sql);

      if ($result) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='text-center'>" . $row['did'] . "</td>";
            echo "<td class='text-center'>" . $row['Name'] . "</td>";
            echo "<td class='text-center'>" . $row['Mobile'] . "</td>";
            echo "<td class='text-center'>" . $row['Address'] . "</td>";
        //     echo "<td class='text-center'>
        //     <form action='update_rider_status.php' method='post'>
        //         <input type='hidden' name='o_id' value='" . $row['o_id'] . "'>
        //         <input type='submit' name='submit_button' value='" . $row['status'] . "'>
        //     </form>
        //   </td>";
           
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>Error fetching data: " . $conn->error . "</td></tr>";
    }

      $conn->close();
      ?>

      </tbody>
    </table>
  </div>
</body>
</html>
