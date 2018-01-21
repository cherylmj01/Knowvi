<?php include('server.php')   ?>

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

.error {color: #FF0000;}


</style>



<body>

<form method="post" action="Register.php">



<div class="container">
    <h1>Register</h1>
    <p>Please fill in your information to register.</p>
    <hr>

    <label><b>Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="name" required>
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>

    <label><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>

    <label>
      <input type="checkbox" checked="checked" style="margin-bottom:15px"> Remember me
    </label>

    <div class="clearfix">
      <button type="button" class="cancelbtn" name="cancel">Cancel</button>
      <button type="submit" class="signupbtn" name="register">Sign Up</button>
    </div>
    
    <p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
   

  </div>
</form>

</body>
</html>