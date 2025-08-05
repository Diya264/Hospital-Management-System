<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include 'connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if username and password fields are empty
    if (empty($_POST['username']) || empty($_POST['password'])) {
        // Redirect to home page
        header("Location: home.php");
        exit(); // Stop further execution
    }

    // Sanitize form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password
    

    // Insert the data into the logininfo table
    $sql = "INSERT INTO logininfo (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // If an error occurred, handle it
        die("Error: " . mysqli_error($conn));
    } else {
        // Data inserted successfully
        echo "<p>Data inserted successfully!</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: 'Poppins', sans-serif;
  height: 100vh;
  width: 100vw;
  background-color: #7227D5;
  display:flex;
  justify-content: center;
  align-items: center;
}

.card{
  background: #fff;
  width: 900px;
  min-height: 400px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  display: flex;


}

.form,
.image{
  width: 50%;
}



.overlay{
  width: 100%;
  height: 100%;
  background-color: rgba(114, 39, 213, 0.31);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  background-image: url("hosp.jpg");
  background-size: cover;
  
}

.overlay h3{
  color:white;
  letter-spacing: 1px;
  font-size: 25px;
  font-weight: 700;
  opacity: 0.6;
}
.overlay p{
  color:white;
  font-size: 13px;
  font-weight: bold;
   opacity: 0.6;
}


.form{
  padding: 60px 25px; 
  display: flex;
  flex-direction: column;
}
.form h3{
  font-size: 28px;
  font-weight: 500;
  position: relative;
  margin-bottom: 30px;
}
.form h3::after{
  content: '';
  width:30px;
  height:3px;
  background: #7227D5;
  position: absolute;
  left: 0;
  bottom: 2px;
  border-radius: 5px;
}



.input-field{
  width: 100%;
  margin-bottom: 10px;
  position: relative;
}
.input-field input{
  display: block; 
  width: 100%;
  padding: 10px 30px;
  outline: none;
  border:none;
  border-bottom: 2px solid rgb(182, 180, 180);
  font-size: 15px;
}

.form>a{
  color:#7227D5;
  text-decoration: none;
  font-size: 14px;
  margin-bottom: 35px
}

button{
  height: 45px;
  width: 370px;
  background: #7227D5;
  border:none;
  color:white;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  transition: background 0.3s ease;
}

button:hover {
  background: #5e1cbf; 
}

button a {
  color: white;
  text-decoration: none;
}


button+p{
  text-align: center;
  padding-top: 30px;
  font-size: 14px;
}

button+p a{
  text-decoration: none;
  color:#7227D5;
  font-weight: 500;
}

input::placeholder {
  font-family: 'Poppins', sans-serif;
}  
</style>
</head>
<body>
  <div class="card">
    <div class="form">
      <h3>Login</h3>
      <form action="login.php" method="post">
      <div class="input-field">
          <input type="text" placeholder="Enter your email">
      </div>
      <div class="input-field">
      <input type="password" placeholder="Enter your password">
    </div>
    <br><br><br><button type="submit" class="btn btn-primary"><a href="home.php">Login</a></button>
    </div>
    <div class="image">
      <div class="overlay">
      <h3>Hospital Management<br>System</h3>
      </div>
    </div>
  </div>
</body>
</html>