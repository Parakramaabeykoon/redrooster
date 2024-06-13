<?php
session_start();
$c_id=$_SESSION['cid'];
$email=$_SESSION['c_email'];
$name=$_SESSION['c_name'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 <link rel="stylesheet" href="./css/payment.stylesheet.css">
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <form action="insertod.php" method="post">
          <div class="products">
            <h3 class="title">Checkout</h3>
          
             
              
        
            <?php
// Retrieve the total value from the query parameters
$total = isset($_GET['total']) ? $_GET['total'] : 0;
$_SESSION['total']=$total;
?>

<!-- Use the $total value as needed in your payment page -->
<div><h4>Total Amount:</h4><?php echo "<h3>  $ $total  </h3>" ; ?></div>

<div class="p-method">
  <div class="cod">
    <input type="radio" name="pay_type" id="cod" value="cod">
    <label for="cod">Cash On Delivery</label>
  </div>
  <div class="online">
    <input type="radio" name="pay_type" id="card_payment" value="online" checked> 
    <label for="card_payment">Online Payment</label>
</div>
</div>

          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">Proceed</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
