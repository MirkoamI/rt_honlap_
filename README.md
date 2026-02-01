ROZS TAMAS PORTFOLIO

A custom-built portfolio website for Tamas Rozs, musician and cellist.

---

WHAT IS INSIDE

- File-Based Management: No database required. Concerts, awards, and biographies are pulled directly from .txt files, making updates as simple as editing a text document.
- Smart Gallery: A responsive image grid with a custom-built Lightbox. You can click into photos and navigate through them using the UI or keyboard arrows.
- Dynamic Concerts: The site automatically detects the current year and month to display upcoming shows, but also allows users to look back through the full yearly archive.

---

TECH STACK

- PHP: Handles the logic for reading text files and managing the concert archive.
- Vanilla JavaScript: Powers the AJAX "Single Page Application" feel and the gallery Lightbox.
- CSS3: Custom styles using Grid and Flexbox.

---

PROJECT STRUCTURE

- /eload: Contains folders by year (e.g., /2026) with monthly .txt files for concert listings.
- /img/galeria: The source for the gallery. Dropping a photo here automatically adds it to the site.
- /szovegek: Stores the bio (bemutatkozas.txt), awards (dijak.txt), and other static content.
- /zene: Where the background tracks live.

---

QUICK START

1. Clone the repo to your local server (XAMPP, MAMP, or a live Linux box).
2. Ensure PHP is running.
3. Open index.php.
4. To update the music, replace ARCOFON.mp3 in the /zene folder or update the path in header.php.
