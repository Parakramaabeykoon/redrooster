<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form in HTML and CSS | Codehal</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="../includes/signup.inc.php" method="post">
            <h1>Red Rooster Farm Registration</h1>
        
             <div class="input-box">
             <div class="input-field">
             <input type="text" placeholder="First  Name" name="fname" required>
              <i class='bx bxs-user'></i>
             </div>
            <div class="input-field">
             <input type="text" placeholder="Last Name" name="lname" required>
             <i class='bx bxs-user'></i>
         </div>
        </div>

        <div class="input-box">
            <div class="input-field">
            <input type="email" placeholder="Email" name="email"
            required>
            <i class='bx bxs-envelope'></i>
         </div>
            <div class="input-field">
            <input type="number" placeholder="Phone Number" name="mobile" required>
            <i class='bx bxs-phone'></i>
          </div>

            <div class="input-box">
                <div class="input-field">
                <input type="password"name="password"
                placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-field">
                <input type="password" name="conpassword"
                placeholder="Confirm Password" required>
                <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-field" id="Address">
                    <input type="text" placeholder="Address" name="address" required>
                     <i class='bx bxs-home'></i>
                </div>
                <label><input type="checkbox">I hereby declare
                    that the above information provided is true and
                    correct</label>
                    
                    <button type="submit" name="submit" class="btn"><b>Register<b></button>
                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="../login/login.html"
                    class="fw-bold text-body"><u>Login here</u></a></p>
        </div>
</form>
</body>

</html>