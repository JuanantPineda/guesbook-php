<?php
$host = getenv('DB_HOST') ?: 'db';
$db = getenv('DB_NAME') ?: 'guestbook';
$user = getenv('DB_USER') ?: 'guestuser';
$pass = getenv('DB_PASSWORD') ?: 'guestpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    $stmt = $pdo->prepare("INSERT INTO messages (message) VALUES (:message)");
    $stmt->execute(['message' => $_POST['message']]);
}
$messages = $pdo->query("SELECT message, created_at FROM messages ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Guestbook</h2>
        <form method="POST">
            <input type="text" name="message" placeholder="Write a message..." required>
            <button type="submit">Submit</button>
        </form>
        <h3>Messages:</h3>
        <ul>
            <?php foreach ($messages as $message) { 
                echo "<li>" . htmlspecialchars($message['message']) . " <small>(" . $message['created_at'] . ")</small></li>"; 
            } ?>
        </ul>
    </div>
</body>
</html>
