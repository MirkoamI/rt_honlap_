<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galéria és Videók - Rozs Tamás</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3d7db;
        }

        main {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
            min-height: calc(100vh - 400px);
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 1200px;
        }

        .content-box h1, .content-box h2 {
            color: #2e7d32;
            border-bottom: 2px solid rgba(46, 125, 50, 0.2);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .gallery-item {
            overflow: hidden;
            border-radius: 4px;
            aspect-ratio: 1 / 1;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .gallery-item img:hover {
            transform: scale(1.1);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 60px;
        }

        .pagination a {
            text-decoration: none;
            color: white;
            background-color: #555;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .pagination a.active {
            background-color: #2e7d32;
        }

        .lightbox {
            display: none;
            position: fixed;
            z-index: 2000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 80%;
            border: 3px solid black;
            border-radius: 4px;
        }

        .close-lb {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        .nav-lb {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 50px;
            font-weight: bold;
            cursor: pointer;
            padding: 20px;
            user-select: none;
        }

        .prev-lb { left: 10px; }
        .next-lb { right: 10px; }

        .video-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
            background: #000;
            border-radius: 4px;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            border: 0;
        }

        @media (max-width: 900px) {
            .gallery-grid { grid-template-columns: repeat(2, 1fr); }
            .video-section { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="content-box">
            <h1>Galéria</h1>
            
            <div class="gallery-grid" id="gallery">
                <?php
                    $mappa = 'img/galeria/';
                    $kepekPerOldal = 12;
                    $aktualisOldal = isset($_GET['oldal']) ? (int)$_GET['oldal'] : 1;
                    if ($aktualisOldal < 1) $aktualisOldal = 1;

                    if (is_dir($mappa)) {
                        $fajlok = array_diff(scandir($mappa), array('.', '..'));
                        $osszesKep = [];
                        foreach ($fajlok as $fajl) {
                            $kiterjesztes = strtolower(pathinfo($fajl, PATHINFO_EXTENSION));
                            if (in_array($kiterjesztes, ['jpg', 'jpeg', 'png', 'webp'])) {
                                $osszesKep[] = $mappa . $fajl;
                            }
                        }

                        $osszesDarab = count($osszesKep);
                        $osszesOldal = ceil($osszesDarab / $kepekPerOldal);
                        $kezdoIndex = ($aktualisOldal - 1) * $kepekPerOldal;
                        $megjelenitettKepek = array_slice($osszesKep, $kezdoIndex, $kepekPerOldal);

                        foreach ($megjelenitettKepek as $index => $kep) {
                            echo '<div class="gallery-item">';
                            echo '<img src="' . $kep . '" class="lb-trigger" data-index="' . $index . '">';
                            echo '</div>';
                        }
                    }
                ?>
            </div>

            <div class="pagination">
                <?php
                    for ($i = 1; $i <= $osszesOldal; $i++) {
                        $activeClass = ($i == $aktualisOldal) ? 'active' : '';
                        echo '<a href="?oldal=' . $i . '" class="' . $activeClass . '">' . $i . '</a>';
                    }
                ?>
            </div>

            <h2>Zenei felvételek</h2>
            <div class="video-section">
                <div class="video-wrapper"><div class="video-container"><iframe src="https://www.youtube.com/embed/E-WOnHQGhtU" allowfullscreen></iframe></div></div>
                <div class="video-wrapper"><div class="video-container"><iframe src="https://www.youtube.com/embed/JYj_7JHzVkk" allowfullscreen></iframe></div></div>
                <div class="video-wrapper"><div class="video-container"><iframe src="https://www.youtube.com/embed/xnwokC4qmjY" allowfullscreen></iframe></div></div>
            </div>
        </div>
    </main>

    <div id="lightbox" class="lightbox">
        <span class="close-lb" onclick="closeLightbox()">&times;</span>
        <span class="nav-lb prev-lb" onclick="changeImage(-1)">&#10094;</span>
        <img class="lightbox-content" id="lb-img">
        <span class="nav-lb next-lb" onclick="changeImage(1)">&#10095;</span>
    </div>

    <script>
        let currentIdx = 0;
        const images = Array.from(document.querySelectorAll('.lb-trigger'));
        const lightbox = document.getElementById('lightbox');
        const lbImg = document.getElementById('lb-img');

        images.forEach((img, index) => {
            img.addEventListener('click', () => {
                currentIdx = index;
                openLightbox();
            });
        });

        function openLightbox() {
            lightbox.style.display = 'flex';
            lbImg.src = images[currentIdx].src;
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function changeImage(n) {
            currentIdx += n;
            if (currentIdx >= images.length) currentIdx = 0;
            if (currentIdx < 0) currentIdx = images.length - 1;
            lbImg.src = images[currentIdx].src;
        }

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        document.addEventListener('keydown', (e) => {
            if (lightbox.style.display === 'flex') {
                if (e.key === "Escape") closeLightbox();
                if (e.key === "ArrowLeft") changeImage(-1);
                if (e.key === "ArrowRight") changeImage(1);
            }
        });
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>