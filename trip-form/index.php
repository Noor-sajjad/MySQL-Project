
<?php
$insert = false;

if(isset($_POST['name'])){



$server = "localhost";
$username = "root";
$password = "";

// Establish connection
$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to this database failed due to " . mysqli_connect_error());
}

// Capture form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

// SQL query
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

// Output the query for debugging
// echo $sql;

if($con->query($sql) == true){
    // echo "sucessfully inserted";

    $insert = true;


}else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcom to travel form</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./style.css?v=1.0">

</head>
<body>
    <div class="container">
        <img class="bg" src="./1234.jpg" alt="">
        <h1>Welcome to US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>

        <form action="./index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>



    </div>
  <script src="./script.js"></script>  
</body>
</html>