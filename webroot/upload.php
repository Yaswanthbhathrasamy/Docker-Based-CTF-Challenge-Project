<?php
// upload.php
include 'db.php';
session_start();

$upload_dir = __DIR__ . '/uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

$msg = '';
$file_url = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['project'])) {
        $msg = "No file uploaded.";
    } else {
        $f = $_FILES['project'];
        $name = basename($f['name']);
        $target = $upload_dir . $name;
        // INSECURE: no checks on extension or content
        if (move_uploaded_file($f['tmp_name'], $target)) {
            $msg = "Uploaded as uploads/$name";
            $file_url = 'uploads/' . rawurlencode($name);
        } else {
            $msg = "Upload failed.";
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Upload Project</title></head>
<body>
  <h2>Project Upload</h2>
  <?php if ($msg) echo "<p>" . htmlspecialchars($msg) . "</p>"; ?>
  <form method="post" enctype="multipart/form-data" action="upload.php">
    <input type="file" name="project" /><br/>
    <input type="submit" value="Upload" />
  </form>

  <?php if ($file_url): ?>
    <p>Uploaded file: <a href="<?php echo htmlspecialchars($file_url); ?>"><?php echo htmlspecialchars($file_url); ?></a></p>
  <?php endif; ?>

  <h3>Existing uploads</h3>
  <ul>
  <?php
    foreach (scandir($upload_dir) as $f) {
      if ($f === '.' || $f === '..') continue;
      echo '<li><a href="uploads/' . rawurlencode($f) . '">' . htmlspecialchars($f) . '</a></li>';
    }
  ?>
  </ul>

  <p><a href="index.php">Home</a></p>
</body>
</html>
