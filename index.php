<?php

require 'vendor/autoload.php'; // Autoloader für Parsedown und Dompdf

use Parsedown;
use Dompdf\Dompdf;

// Lade die Markdown-Datei
$markdownFile = 'input.md';

if (!file_exists($markdownFile)) {
    die("Die Datei 'input.md' wurde nicht gefunden.");
}

$markdownContent = file_get_contents($markdownFile);

// Konvertiere Markdown zu HTML
$parsedown = new Parsedown();
$htmlContent = $parsedown->text($markdownContent);

// HTML in ein einfaches PDF-Template einfügen
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

// HTML zu PDF umwandeln
$dompdf = new Dompdf();
$dompdf->loadHtml($pdfTemplate);

// Optional: Papierformat und Orientierung einstellen
$dompdf->setPaper('A4', 'portrait');

// PDF rendern
$dompdf->render();

// PDF speichern oder an den Browser senden
$outputPath = 'output.pdf';
file_put_contents($outputPath, $dompdf->output());

echo "Die PDF wurde erfolgreich erstellt: <a href='$outputPath'>output.pdf</a>";

