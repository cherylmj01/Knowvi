<?php



  // REGISTER USER email
 if (isset($_POST['register'])) {
    // receive all input values from the form
   
    $email = mysqli_real_escape_string($mysqli , $_POST['email']);
    //echo $email;
  
    $emailErr = "";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }



      // form validation: ensure that the form is correctly filled
      if (empty($email)) { array_push($errors, "Email is required");  }

    else {
        $email = test_input($_POST["email"]);
        //echo $email;
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format"; 
        }
      }

      $mysqli->close();

      ?>