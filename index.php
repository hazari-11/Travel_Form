<?php
$insert = false;
if(isset($_POST['name'])){
    
// Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// Create a database connection
$con = mysqli_connect($server, $username, $password);

// Check for connection success
if(!$con){
    die("Connection to this database failed due to ". mysqli_connect_error());
}

// echo "Successfully connected to the db";

// Collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$phone', '$email', '$desc', current_timestamp());";

// echo $sql;

// Execute the query
if($con->query($sql) == true){
    // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
}
else {
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection
$con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100;1,300&display=swap"
      rel="stylesheet"
    />
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img class="bg" src="IITDhn.jpg" alt="IIT Dhanbad" />
    <div class="container">
      <h1>Welcome to IIT Dhanbad US Trip Form</h1>
      <p>
        Enter your details and submit this form to confirm your participation in
        the trip
      </p>
      <?php
      if($insert == true){
      echo "<p class='submitMsg'>
        Thanks for submitting your form. We are happy to see you joining the US
        trip.
      </p>";
      }
      ?>
      <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
        
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>