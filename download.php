<?php
$filePath = __DIR__.'/downloads/rasp.xlsx';

if (!file_exists($filePath)) {
    header('HTTP/1.1 404 Not Found');
    die('Файл расписания не найден');
}

$fileName = 'schedule_'.date('Y-m-d').'.xlsx';

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$fileName.'"');
header('Content-Length: ' . filesize($filePath));
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Expires: 0');

readfile($filePath);
exit;
?>