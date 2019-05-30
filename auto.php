<?php
require "connect.php";


$sql = "INSERT INTO motor (current,voltage,speed,vibration,pressure,flowrate,temp1,temp2)  VALUES (RAND()*(100),RAND()*(100),RAND()*(100),RAND()*(100),RAND()*(100),RAND()*(100),RAND()*(100),RAND()*(100))";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
