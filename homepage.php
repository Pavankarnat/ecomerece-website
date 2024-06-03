<!-- homepage.php -->
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
    <p>This is the homepage.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
