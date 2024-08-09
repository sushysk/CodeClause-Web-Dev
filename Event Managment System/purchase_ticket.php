<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'event_management');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tickets (event_id, user_id) VALUES ('$event_id', '$user_id')";
    $conn->query($sql);

    header('Location: dashboard.php');
}
?>
