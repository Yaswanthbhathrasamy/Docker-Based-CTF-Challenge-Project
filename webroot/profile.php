<?php
// profile.php
include 'db.php';
session_start();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    echo "Invalid id";
    exit;
}

$sql = "SELECT id, username, role, profile FROM users WHERE id = " . $id;
$res = mysqli_query($conn, $sql);
if (!$res || mysqli_num_rows($res) !== 1) {
    echo "User not found";
    exit;
}
$row = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Profile: <?php echo htmlspecialchars($row['username']); ?></title></head>
<body>
  <h2>Profile: <?php echo htmlspecialchars($row['username']); ?></h2>
  <p>Role: <?php echo htmlspecialchars($row['role']); ?></p>
  <h3>Diary</h3>
  <pre><?php echo htmlspecialchars($row['profile']); ?></pre>
  <p><a href="index.php">Home</a></p>
</body>
</html>
