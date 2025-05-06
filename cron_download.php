<?php
// Настройки
$remoteUrl = 'http://spospk.ru/document/rasp/rasp.xlsx'; // URL источника
$savePath = __DIR__.'/downloads/rasp.xlsx'; // Путь для сохранения
$backupPath = __DIR__.'/downloads/old_schedule.xlsx'; // Путь для бэкапа

// Создаем папку downloads если нет
if (!is_dir(__DIR__.'/downloads')) {
    mkdir(__DIR__.'/downloads', 0755, true);
}

// Удаляем старый файл если существует
if (file_exists($savePath)) {
    // Создаем бэкап старого файла
    copy($savePath, $backupPath);
    unlink($savePath);
}

// Скачиваем новый файл
$fileContent = file_get_contents($remoteUrl);

if ($fileContent !== false) {
    file_put_contents($savePath, $fileContent);
    file_put_contents(__DIR__.'/downloads/last_update.txt', date('Y-m-d H:i:s'));
}
?>