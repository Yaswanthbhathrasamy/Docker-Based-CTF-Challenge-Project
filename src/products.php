<?php
include 'db.php';

$category = $_GET['category'] ?? '';

// Vulnerable SQL query with UNION-based SQLi
$sql = "SELECT name, description FROM products WHERE category = '$category'";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Nevermore Academy Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Nevermore Academy Products</h1>
    <div class="search-box">
        <form method="GET" action="products.php">
            <input type="text" name="category" placeholder="Search by category (try 'magic' or 'all')" value="<?php echo htmlspecialchars($category); ?>">
            <input type="submit" value="Search">
        </form>
    </div>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='no-results'>No products found. Try another category.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <div class="back-link">
        <a href="dashboard.php">← Back to Dashboard</a>
    </div>
</div>

<style>
.search-box {
    margin: 20px 0;
    display: flex;
    gap: 10px;
}

.search-box input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #444;
    border-radius: 4px;
    background-color: rgba(255, 255, 255, 0.9);
    color: #333;
}

.table-responsive {
    overflow-x: auto;
    margin: 20px 0;
}

.no-results {
    text-align: center;
    padding: 20px;
    color: #ffcc00;
}

.back-link {
    margin-top: 20px;
    text-align: center;
}

.back-link a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
}

.back-link a:hover {
    text-decoration: underline;
}
</style>
</body>
</html>
