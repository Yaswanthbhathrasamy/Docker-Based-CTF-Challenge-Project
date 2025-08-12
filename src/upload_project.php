<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["project_file"]["name"]);

    // Insecure file upload: no extension or mime type checks
    if (move_uploaded_file($_FILES["project_file"]["tmp_name"], $target_file)) {
        $message = "File uploaded successfully.";
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nevermore Academy - Upload Project</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container" style="max-width: 600px;">
    <h1>Upload Your Project</h1>
    
    <?php if ($message): ?>
        <div class="message <?php echo strpos($message, 'error') !== false ? 'error' : 'success'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
    
    <div class="upload-container">
        <form action="upload_project.php" method="POST" enctype="multipart/form-data" class="upload-form">
            <div class="file-upload">
                <input type="file" name="project_file" id="project_file" required>
                <label for="project_file">
                    <i class="upload-icon">📁</i>
                    <span>Choose a file or drag it here</span>
                </label>
            </div>
            <button type="submit" class="upload-button">
                <span>Upload Project</span>
                <i>⬆️</i>
            </button>
        </form>
        
        <div class="upload-note">
            <p><strong>Note:</strong> Only .php, .jpg, .png files are allowed (Max: 2MB)</p>
        </div>
    </div>
    
    <div class="back-link" style="margin-top: 30px;">
        <a href="dashboard.php">← Back to Dashboard</a>
    </div>
</div>

<style>
.upload-container {
    background-color: rgba(0, 0, 0, 0.4);
    border-radius: 8px;
    padding: 25px;
    margin-top: 20px;
}

.upload-form {
    margin-bottom: 20px;
}

.file-upload {
    margin-bottom: 20px;
}

.file-upload input[type="file"] {
    display: none;
}

.file-upload label {
    display: block;
    padding: 40px 20px;
    border: 2px dashed #444;
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
}

.file-upload label:hover {
    border-color: #4CAF50;
    background-color: rgba(76, 175, 80, 0.1);
}

.upload-icon {
    display: block;
    font-size: 2.5em;
    margin-bottom: 10px;
}

.upload-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

.upload-button:hover {
    background-color: #45a049;
}

.upload-note {
    font-size: 0.9em;
    color: #aaa;
    text-align: center;
    margin-top: 20px;
    padding-top: 15px;
    border-top: 1px solid #444;
}

.back-link {
    text-align: center;
    margin-top: 20px;
}

.back-link a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 15px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.back-link a:hover {
    background-color: rgba(76, 175, 80, 0.2);
    text-decoration: none;
}

.message {
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
}

.message.success {
    background-color: rgba(46, 125, 50, 0.3);
    border: 1px solid #2e7d32;
    color: #a5d6a7;
}

.message.error {
    background-color: rgba(198, 40, 40, 0.3);
    border: 1px solid #c62828;
    color: #ff8a80;
}
</style>

<script>
// Enhance file input with filename display
document.getElementById('project_file').addEventListener('change', function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
    const label = this.nextElementSibling;
    const span = label.querySelector('span');
    span.textContent = fileName;
});

// Add drag and drop functionality
const dropArea = document.querySelector('.file-upload label');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
});

function highlight() {
    dropArea.style.borderColor = '#4CAF50';
    dropArea.style.backgroundColor = 'rgba(76, 175, 80, 0.1)';
}

function unhighlight() {
    dropArea.style.borderColor = '#444';
    dropArea.style.backgroundColor = 'transparent';
}

dropArea.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    const input = document.getElementById('project_file');
    input.files = files;
    
    // Trigger change event to update filename display
    const event = new Event('change');
    input.dispatchEvent(event);
}
</script>
</body>
</html>
