<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS via CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom styles -->
    <title>Document</title>
</head>
<body>
<a href="index.php" style="color:black">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
    </svg>
</a>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            include_once('../includes/dbh.inc.php');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $select = mysqli_query($conn, "SELECT * FROM customer");
            if ($select) {
                while ($row = mysqli_fetch_assoc($select)) {
                    echo "<tr>";
                    echo "<td>". $row['customer_id'] ."</td>";
                    echo "<td>". $row['first_name'] ."</td>";
                    echo "<td>". $row['last_name'] ."</td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
</table>
</body>
</html>
