<?php

require 'vendor/autoload.php'; // Autoloader für Parsedown und Dompdf

use Parsedown;
use Dompdf\Dompdf;

// Verzeichnisse für Uploads und Ausgaben
$uploadDir = 'uploads/';
$outputDir = 'output/';

// Überprüfen, ob ein Upload erfolgt ist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpPath = $file['tmp_name'];

    // Überprüfen, ob es sich um eine .md-Datei handelt
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if ($fileExtension !== 'md') {
        die("Fehler: Nur .md-Dateien sind erlaubt.");
    }

    // Speichere die hochgeladene Datei
    $uploadedFilePath = $uploadDir . basename($fileName);
    if (!move_uploaded_file($fileTmpPath, $uploadedFilePath)) {
        die("Fehler beim Hochladen der Datei.");
    }

    // Lade und konvertiere die Markdown-Datei
    $markdownContent = file_get_contents($uploadedFilePath);
    $parsedown = new Parsedown();
    $htmlContent = $parsedown->text($markdownContent);

    // HTML zu PDF konvertieren
    $pdfTemplate = "
    <!DOCTYPE html>
    <html lang='de'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Markdown zu PDF</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
            h1, h2, h3 { color: #333; }
        </style>
    </head>
    <body>
    $htmlContent
    </body>
    </html>
    ";

    $dompdf = new Dompdf();
    $dompdf->loadHtml($pdfTemplate);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // PDF speichern
    $outputFilePath = $outputDir . pathinfo($fileName, PATHINFO_FILENAME) . '.pdf';
    file_put_contents($outputFilePath, $dompdf->output());

    echo "Die Datei wurde erfolgreich konvertiert: <a href='$outputFilePath'>PDF herunterladen</a>";
} else {
    die("Keine Datei hochgeladen.");
}

