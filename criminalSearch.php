<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>






    <style>



    </style>

</head>


<body>









<?php


$personName = $_GET['nameInput'];
$personSex = $_GET['sexInput'];
$personHair = $_GET['hairInput'];
$personEye = $_GET['eyeInput'];
$personHeight = $_GET['heightInput'];
$personBuild = $_GET['buildInput'];
$personFingerprint = $_GET['fingerprintInput'];
$personGlasses = $_GET['glassesInput'];


$servername = "localhost";
$username = "root";
$password = "root";
$database = "criminal-database";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql_statement= "SELECT * FROM `LongListofSuspects` WHERE `Name` LIKE '%$personName%' AND Sex LIKE '%$personSex%' AND Hair LIKE '%$personHair%' AND EYES LIKE '%$personEye%' AND Height LIKE '%$personHeight%' AND Build LIKE '%$personBuild%' AND Finger_Print LIKE '%$personFingerprint%' AND Glasses LIKE '%$personGlasses'";


if($result = mysqli_query($connection, $sql_statement )){

    echo "<p style='text-align: center; font-size: 40px'>" . mysqli_affected_rows($connection) . " Suspects Found </p><br><br><br>";

    ?>
        <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Sex</th>
            <th scope="col">Hair</th>
            <th scope="col">Eyes</th>
            <th scope="col">Build</th>
            <th scope="col">Finger Print</th>
            <th scope="col">Glasses</th>
        </tr>
        </thead>
        <tbody>
    <?php

    $rowcounter = 0;
while ($row = mysqli_fetch_assoc($result)){

    $rowcounter++;

    ?>




        <tr>
            <th scope="row"><?php echo $rowcounter; ?></th>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Sex']; ?></td>
            <td><?php echo $row['Hair']; ?></td>
            <td><?php echo $row['Eyes']; ?></td>
            <td><?php echo $row['Build']; ?></td>
            <td><?php echo $row['Finger_Print']; ?></td>
            <td><?php echo $row['Glasses']; ?></td>
        </tr>

  <?php
    }   // end of while loop
    ?>

        </tbody>
    </table>


<?php

} else {


    echo "ERROR: " . $sql_statement . "<br>" . mysqli_error($connection);
}

?>

</body>

</html>

