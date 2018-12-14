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
echo "Connected successfully";

$sql_statement= "INSERT INTO `LongListofSuspects` (`id`, `Name`, `Sex`, `Hair`, `Eyes`, `Height`, `Build`, `Finger_Print`, `Glasses`) VALUES (NULL, '$personName', '$personSex', '$personHair', '$personEye', '$personHeight', '$personBuild', '$personFingerprint', '$personGlasses')";

if ($connection->query($sql_statement) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql_statement . "<br>" . $connection->error;
}

$connection->close();
