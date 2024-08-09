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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>

    <h2>Create Event</h2>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Event Title" required>
        <textarea name="description" placeholder="Event Description" required></textarea>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <input type="text" name="venue" placeholder="Venue" required>
        <button type="submit">Create Event</button>
    </form>

    <h2>Your Events</h2>
    <ul>
        <?php while ($event = $events->fetch_assoc()): ?>
            <li>
                <?php echo $event['title']; ?> - <?php echo $event['date']; ?>
                <form action="purchase_ticket.php" method="POST">
                    <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                    <button type="submit">Purchase Ticket</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
