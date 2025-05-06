<?php
$scheduleFile = 'downloads/rasp.xlsx';
$lastUpdateFile = 'downloads/last_update.txt';

$lastUpdate = file_exists($lastUpdateFile) 
    ? date('d.m.Y H:i', filemtime($lastUpdateFile)) 
    : 'еще не обновлялось';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание занятий в Северском промышленном колледже</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .download-btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: <?= file_exists($scheduleFile) ? '#3498db' : '#95a5a6' ?>;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
            cursor: <?= file_exists($scheduleFile) ? 'pointer' : 'not-allowed' ?>;
        }
        .download-btn:hover {
            background-color: <?= file_exists($scheduleFile) ? '#2980b9' : '#95a5a6' ?>;
        }
        .update-info {
            color: #7f8c8d;
            margin-top: 20px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Расписание занятий в Северском промышленном колледже</h1>
        <p>Актуальное расписание обновляется ежедневно в 17:00</p>
        
        <?php if(file_exists($scheduleFile)): ?>
            <a href="download.php" class="download-btn">Скачать расписание</a>
        <?php else: ?>
            <div class="download-btn">Расписание недоступно</div>
        <?php endif; ?>

        <div class="update-info">
            Последнее обновление: <?= $lastUpdate ?>
        </div>
    </div>
</body>
</html>