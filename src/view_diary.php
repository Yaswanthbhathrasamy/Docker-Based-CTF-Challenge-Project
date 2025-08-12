<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? '';

// Sample diary entries for different IDs
$diary_entries = [
    1 => [
        'title' => 'First Day at Nevermore',
        'content' => 'Today was my first day at Nevermore Academy. The place is... interesting. The other students seem nice, though a bit strange.'
    ],
    2 => [
        'title' => 'Strange Occurrences',
        'content' => 'I keep seeing shadows moving in the corner of my eye. The teachers say it\'s just my imagination, but I know what I saw.'
    ],
    3 => [
        'title' => 'The Secret Club',
        'content' => 'I think I found a secret society on campus. They meet in the old clock tower at midnight. I need to investigate further.'
    ],
    4 => [
        'title' => 'Mysterious Notes',
        'content' => 'Someone has been leaving me mysterious notes. The handwriting is elegant but unfamiliar. Who could it be?'
    ],
    5 => [
        'title' => 'The Forbidden Library',
        'content' => 'Discovered a hidden section in the library today. The books there are... unusual. I found one that seems to be written in blood.'
    ],
    6 => [
        'title' => 'Midnight Meeting',
        'content' => 'Met with the Nightshades tonight. They\'re not what I expected. They say there\'s a prophecy about me. Ridiculous.'
    ],
    7 => [
        'title' => 'The Monster',
        'content' => 'I saw it again last night. The monster from my visions. It\'s real, and it\'s here at Nevermore. I need to tell someone.'
    ],
    8 => [
        'title' => 'Trust No One',
        'content' => 'I don\'t know who to trust anymore. The headmaster is hiding something, and I think some of the students are involved too.'
    ],
    9 => [
        'title' => 'The Truth',
        'content' => 'I\'ve discovered the terrible secret of Nevermore Academy. The truth is too dangerous to write here, but I must remember: "The raven flies at midnight." Also, here\'s the flag you\'re looking for: FLAG{ID0R_VULN_MAST3R}.'
    ]
];

// Get the requested diary entry or show a default message
$entry = $diary_entries[$id] ?? [
    'title' => 'Entry Not Found',
    'content' => 'This diary entry doesn\'t exist or has been removed.'
];

$flag1 = "FLAG{ID0R_VULN_MAST3R}";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Nevermore Academy - Student Diary</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Diary Entry</h1>
    
    <?php if (isset($diary_entries[$id])): ?>
        <div class="diary-entry">
            <div class="diary-header">
                <h2><?php echo htmlspecialchars($entry['title']); ?></h2>
                <div class="diary-meta">
                    <span class="diary-date"><?php echo date('F j, Y', strtotime('2023-08-12')); ?></span>
                </div>
            </div>
            
            <div class="diary-content">
                <?php echo nl2br(htmlspecialchars($entry['content'])); ?>
            </div>
            
            <?php if ($id == 9): ?>
                <div class="flag">
                    <?php echo $flag1; ?>
                </div>
            <?php endif; ?>
            
            <div class="diary-navigation">
                <a href="dashboard.php" class="back-button">← Back to Dashboard</a>
                <div class="page-numbers">
                    <a href="#" class="active">1</a>
                    <a href="view_diary.php?id=2">2</a>
                    <a href="#">→</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="error-message">
            <p>Diary entry not found or you don't have permission to view it.</p>
            <a href="dashboard.php" class="back-button">← Back to Dashboard</a>
        </div>
    <?php endif; ?>
</div>

<style>
.diary-entry {
    background-color: rgba(0, 0, 0, 0.4);
    border-radius: 8px;
    padding: 25px;
    margin-top: 20px;
}

.diary-header {
    border-bottom: 1px solid #444;
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.diary-meta {
    color: #aaa;
    font-size: 0.9em;
    margin-top: 5px;
}

.diary-content {
    line-height: 1.6;
    font-size: 1.1em;
    margin-bottom: 30px;
}

.flag {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 15px;
    border-radius: 5px;
    text-align: center;
    font-family: monospace;
    font-size: 1.2em;
    color: #ffcc00;
    margin: 30px 0;
    border: 1px dashed #ffcc00;
}

.diary-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #444;
}

.back-button {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 15px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.back-button:hover {
    background-color: rgba(76, 175, 80, 0.2);
    text-decoration: none;
}

.page-numbers {
    display: flex;
    gap: 5px;
}

.page-numbers a {
    display: inline-block;
    padding: 8px 12px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    color: white;
    text-decoration: none;
    transition: background-color 0.3s;
}

.page-numbers a:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

.page-numbers a.active {
    background-color: #4CAF50;
    color: white;
}

.error-message {
    text-align: center;
    padding: 30px;
}

.error-message p {
    margin-bottom: 20px;
    color: #ff6b6b;
}
</style>
</body>
</html>
