<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="datetime-local" name="arrived_at" id=""><br>
    <input type="datetime-local" name="leaved_at" id=""><br>
    <button type="submit">Yuborish</button>
</form>

<?php


$dns = "mysql:host=localhost;dbname=work_of_tracker"; 
$username = "root";
$password = "qwert";

$pdo =  new PDO($dns,$username,$password);

$workTimes = $pdo->query("SELECT * FROM work_times");

print_r($workTimes->fetch());

define('WORK_TIME', 8);

if (isset($_POST['arrived_at']) && isset($_POST['leaved_at'])) {
    $arrived_at = new DateTime($_POST['arrived_at']);
    $leaved_at = new DateTime($_POST['leaved_at']);
    $diff = $arrived_at->diff($leaved_at);

    echo "
    <h1>Arrived at: {$_POST['arrived_at']}</h1>
    <h1>Leaved at: {$_POST['leaved_at']}</h1>
    <h1>Work Time: " . WORK_TIME . " hours</h1>
    <h1>Diff Hour: {$diff->h}</h1>
    <h1>Diff Minutes: {$diff->i}</h1>
    ";

    $query = "INSEERT INTO work_times (arrived_at, leaved_at)"
}

?>
</body>
</html>

