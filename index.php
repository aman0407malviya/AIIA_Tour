<?php
    if(isset($_POST['name'])){

        //set connection variable
    $server = "localhost";
    $username = "root";
    $password = "";

        //create a database connection
    $con = mysqli_connect($server, $username, $password);


        //check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connection to the db";


    //collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $desc = $_POST['desc'];
    $sql = "INSERT INTO `AIIA_Trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone',  current_timestamp());";
    // echo $sql;


    //execute the query
    if($con->query($sql) == true){
        // echo "successfully inserted";

        //Flag for successful insertion
        $insert = true;
    }
    else{
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
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpg" class="bg" alt="AIIA New Delhi">
    <div class="container">
        <h1>Welcome to AIIA Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting your form we are happy to see you joining 
        us for the trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone ">
            <!-- <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea> -->
            <!-- <select name="course" id="course" placeholder="select your course">
                <option value="">Please Select Your course</option>
                <option value="phd">phd</option>
                <option value="mbbs">mbbs</option>
            </select> -->
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

