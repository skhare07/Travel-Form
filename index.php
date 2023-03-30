<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("Connection to this database failed due to ". mysqli_connect_error());
}
//echo "Success connecting to the DB"

//Collect post variable
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql ="INSERT INTO `form`.`form` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

//execute the query
if($con->query($sql) == true){
    //echo "Successfully inserted";
    $insert = true ;
}
else{
    echo "Error: $sql <br> $con->error";
}

//Close the database collection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <img class="mptour" src="mptour.jpg" alt="MPTOUR">
  <div class="container">
  <h1>Welcome to MP tourism trip Form </h1>
  <p>Enter your details</p>
  <?php
  if($insert == true){
  echo "<p class='submitMsg'>Thanks for submitting your details</p>";
  }
  ?>
  <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="text" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender">
    <input type="email" name="email" id="email" placeholder="Enter your Email">
    <input type="phone" name="phone" id="phone" placeholder="Enter your Phone">
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other details here"></textarea>
    <button class="btn">Submit</button>
  </form>
  </div>
  <script src="index.js"></script>
  
</body>
</html>