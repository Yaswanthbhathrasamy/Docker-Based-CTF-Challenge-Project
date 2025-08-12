<?php
// login.php
include 'db.php';
session_start();
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    // Note: this login uses the auth table discovered by SQLi:
    $sql = "SELECT * FROM users_wed123 WHERE username_wed123 = '" . $user . "' AND password_wed123 = '" . $pass . "' LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if ($res && mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);
        // create a simple session using the username
        $_SESSION['username'] = $row['username_wed123'];
        header('Location: profile.php?id=3'); // after login, redirect to manager profile as an example
        exit;
    } else {
        $err = 'Login failed';
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
  <h2>Login</h2>
  <?php if ($err) echo "<p style='color:red;'>" . htmlspecialchars($err) . "</p>"; ?>
  <form method="post" action="login.php">
    <label>Username: <input name="username" /></label><br/>
    <label>Password: <input name="password" type="password" /></label><br/>
    <input type="submit" value="Login" />
  </form>
  <p><a href="index.php">Home</a></p>
</body>
</html>
