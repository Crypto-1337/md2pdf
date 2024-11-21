
# Markdown zu PDF Konverter

Dieses Projekt ist ein einfacher Web-basierter Konverter, der es ermöglicht, `.md`-Dateien (Markdown) hochzuladen und sie in PDF-Dateien umzuwandeln. Es nutzt die Bibliotheken **Parsedown** für die Umwandlung von Markdown in HTML und **Dompdf** für die Erstellung von PDFs.

---

## Funktionen

- **Markdown-Datei hochladen**: Nur `.md`-Dateien werden akzeptiert.
- **Automatische Konvertierung**: Die hochgeladene Markdown-Datei wird in eine PDF-Datei umgewandelt.
- **Benutzerfreundlich**: Einfache Weboberfläche zur Auswahl und Konvertierung von Dateien.

---

## Voraussetzungen

1. **PHP**: Version 7.4 oder höher.
2. **Composer**: Zum Installieren der benötigten PHP-Bibliotheken.

---

## Installation

1. Klone dieses Repository oder lade die Dateien herunter:
   ```bash
   git clone <repository-url>
   cd md2pdf
   ```

2. Installiere die Abhängigkeiten mit Composer:
   ```bash
   composer install
   ```

3. Erstelle die Verzeichnisse für Uploads und PDF-Ausgaben:
   ```bash
   mkdir uploads output
   chmod 755 uploads output
   ```

4. Stelle sicher, dass ein lokaler PHP-Server läuft:
   ```bash
   php -S localhost:8000
   ```

5. Öffne deinen Browser und gehe zu:  
   [http://localhost:8000/index.php](http://localhost:8000/index.php)

---

## Nutzung

1. Öffne die Hauptseite und lade eine `.md`-Datei hoch.
2. Die Datei wird geprüft und in eine PDF-Datei umgewandelt.
3. Ein Link zur herunterladbaren PDF wird angezeigt.

---

## Projektstruktur

```plaintext
md-to-pdf/
├── index.php         # Hauptseite für den Datei-Upload
├── upload.php        # Logik für den Datei-Upload und die Konvertierung
├── uploads/          # Verzeichnis für hochgeladene Dateien
├── output/           # Verzeichnis für generierte PDF-Dateien
├── vendor/           # Abhängigkeiten (erstellt durch Composer)
├── composer.json     # Composer-Konfigurationsdatei
├── composer.lock     # Composer-Abhängigkeiten
```

---

## Abhängigkeiten

- [Parsedown](https://github.com/erusev/parsedown): Zum Konvertieren von Markdown in HTML.
- [Dompdf](https://github.com/dompdf/dompdf): Zum Generieren von PDFs aus HTML.

---

## Sicherheitshinweise

- Überprüfe die hochgeladenen Dateien, um sicherzustellen, dass sie tatsächlich `.md`-Dateien sind.
- Stelle sicher, dass das `uploads/`-Verzeichnis vor unbefugtem Zugriff geschützt ist.
- Nutze sichere Dateinamen und validiere Eingaben.

---

## Lizenz

Dieses Projekt steht unter der MIT-Lizenz. Siehe die Datei `LICENSE` für weitere Informationen.

---
