<?php
// products.php
include 'db.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';

$sql = "SELECT name, description FROM products WHERE category = '$category'";
$res = mysqli_query($conn, $sql);
if (!$res) {
    die("Query error: " . mysqli_error($conn));
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Products - <?php echo htmlspecialchars($category); ?></title></head>
<body>
  <h2>Products in category: <?php echo htmlspecialchars($category); ?></h2>
  <ul>
  <?php
  while ($row = mysqli_fetch_row($res)) {
      // echo two text columns (index 0 and 1)
      echo "<li><strong>" . htmlspecialchars($row[0]) . "</strong> - " . htmlspecialchars($row[1]) . "</li>";
  }
  ?>
  </ul>

  <h3>Try a different category</h3>
  <form method="get" action="products.php">
    <input name="category" value="<?php echo htmlspecialchars($category); ?>" />
    <input type="submit" value="Go" />
  </form>

  <p><a href="index.php">Home</a></p>
</body>
</html>
