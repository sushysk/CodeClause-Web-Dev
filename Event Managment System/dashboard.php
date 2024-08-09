<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'event_management');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $created_by = $_SESSION['user_id'];

    $sql = "INSERT INTO events (title, description, date, time, venue, created_by) VALUES ('$title', '$description', '$date', '$time', '$venue', '$created_by')";
    $conn->query($sql);
}

$events = $conn->query("SELECT * FROM events WHERE created_by = {$_SESSION['user_id']}");
?> 
