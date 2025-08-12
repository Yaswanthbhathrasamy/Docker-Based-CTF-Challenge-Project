<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nevermore Academy - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <div class="dashboard-links">
        <a href="view_diary.php?id=1" class="dashboard-button">View Diary Entry</a>
        <a href="upload_project.php" class="dashboard-button">Upload Project</a>
        <a href="products.php?category=all" class="dashboard-button">View Products</a>
        <a href="logout.php" class="dashboard-button" style="background-color: #d32f2f;">Logout</a>
    </div>
</div>

<style>
.dashboard-links {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 30px;
}

.dashboard-button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    transition: all 0.3s ease;
    min-height: 60px;
}

.dashboard-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    text-decoration: none;
}
</style>
</body>
</html>
