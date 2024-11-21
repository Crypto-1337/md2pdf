<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markdown zu PDF Konverter</title>
</head>
<body>
    <h1>Markdown zu PDF Konverter</h1>
    <p>Laden Sie Ihre Markdown-Datei (.md) hoch, um sie in eine PDF-Datei umzuwandeln.</p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Wählen Sie eine Markdown-Datei aus:</label>
        <input type="file" name="file" id="file" accept=".md" required>
        <button type="submit">Hochladen und konvertieren</button>
    </form>
</body>
</html>

