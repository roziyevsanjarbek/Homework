<?php

$server = "localhost"; 
$user = "root";   
$password = "qwert"; 
$db = "car";   

$conn = mysqli_connect($server, $user, $password, $db);

$name = "Damas";
$car_color = "Oq";
$sql = "INSERT INTO car (name, car_color) VALUES ('$name', '$car_color')";

$sql = "SELECT * FROM car";
$result = mysqli_query($conn, $sql);

$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($cars as $car) {
	echo "Mashina nomi: " . $car['name'] . "<br>";
	echo "Mashina rangi: " . $car['car_color'] . "<br><br>";
}

mysqli_close($conn);
?>
