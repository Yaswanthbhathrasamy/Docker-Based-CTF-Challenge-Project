<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable query, no password hashing
    $sql = "SELECT * FROM users_xxxxx WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nevermore Academy Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container" style="max-width: 500px; margin: 100px auto;">
    <h1>Nevermore Academy</h1>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<div class='error message'>" . htmlspecialchars($error) . "</div>"; } ?>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
