<?php

session_start();


  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'registration');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

  //echo 'Connected successfully.';


 



// REGISTER USER
if (isset($_POST['register'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($mysqli , $_POST['name']);
    //echo $username;
    $email = mysqli_real_escape_string($mysqli , $_POST['email']);
    //echo $email;
    $password_1 = mysqli_real_escape_string($mysqli , $_POST['psw']);
    //echo $password_1;
    $password_2 = mysqli_real_escape_string($mysqli , $_POST['psw-repeat']);
    //echo $password_2;
  
    // form validation: ensure that the form is correctly filled

    $nameErr = $emailErr = $passErr = $nameErr2 = $passErr2 = "";


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if (empty($username)) { array_push($errors, "Username is required"); } 

    else {
        //echo 'hi';
        $username = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        //echo $username;
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
          $nameErr = "Only letters and white space allowed"; 
        }
      }

    if (empty($email)) { array_push($errors, "Email is required");  }

    else {
        $email = test_input($_POST["email"]);
        //echo $email;
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format"; 
        }
      }
    
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    
    if (empty($password_2)) { array_push($errors, "Password is required"); }
 
    else { 
        if ($password_1 != $password_2) {
       
        array_push($errors, "The two passwords do not match");
        $passErr = "Passwords do not match"; 
      }
    }

    //$countoferror = count($errors);
    //echo $countoferror ;
  
  
    // register user if there are no errors in the form
    if (empty($passErr) && empty($nameErr)  && empty($emailErr) ) {
       
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO user_meta (Name, Email_id, Password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($mysqli , $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
  
  }

  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $username2 = mysqli_real_escape_string($mysqli, $_POST['username']);
    //echo $username2;
    $password2 = mysqli_real_escape_string($mysqli, $_POST['password']);
  
    if (empty($username2)) {
        array_push($errors, "Username is required");
        $nameErr2 = "Username is required";
    }
    if (empty($password2)) {
        array_push($errors, "Password is required");
        $passErr2 = "Password is required";
    }
  
    if (empty($passErr2) && empty($nameErr2) ) {
        
        $passwordnew = md5($password2);
        

        /*
        if (md5($password_1) == md5($password2)) { 
            echo "hashes match!"; 
        } */
       
        $query2 = "SELECT * FROM user_meta WHERE Name='$username2'";
        //echo $query2;
        $results = mysqli_query($mysqli, $query2);
        //$var = mysqli_num_rows($results);
        //echo $var;

        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username2;
          //echo $_SESSION['username'];
          $_SESSION['success'] = "You are now logged in";
         // echo $_SESSION['success'];
          header('location: index.php');
         // echo $_SESSION['success'];
        }
        else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }




$mysqli->close();





?>