<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interjúk és Felvételek - Rozs Tamás</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3d7db;
        }

        main {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 20px;
            padding: 20px;
            min-height: calc(100vh - 400px);
        }

        .side-images {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        .side-images img {
            width: 100%;
            max-width: 220px;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .content-box h1 {
            margin-top: 0;
            color: #2e7d32;
            border-bottom: 2px solid rgba(46, 125, 50, 0.2);
            padding-bottom: 10px;
        }

        .content-box h2 {
            color: #333;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 1.4em;
        }

        .video-wrapper {
            margin-bottom: 40px;
        }

        .video-wrapper h3 {
            font-size: 1.1em;
            color: #1b5e20;
            margin-bottom: 10px;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
            margin-bottom: 10px;
            background: #000;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .article-list {
            list-style: none;
            padding: 0;
        }

        .article-list li {
            margin-bottom: 15px;
            padding: 15px;
            background: rgba(255,255,255,0.3);
            border-radius: 4px;
        }

        .article-list a {
            color: #1b5e20;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            display: block;
        }

        .article-list a:hover {
            text-decoration: underline;
        }

        @media (max-width: 1100px) {
            main {
                grid-template-columns: 1fr;
            }
            .side-images {
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
            }
            .side-images img {
                width: 30%;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
        $mappa = 'img/galeria/';
        $osszesKep = [];
        if (is_dir($mappa)) {
            $osszesKep = glob($mappa . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
            shuffle($osszesKep);
        }
    ?>

    <main>
        <div class="side-images">
            <?php
                $balOldali = array_slice($osszesKep, 0, 3);
                foreach ($balOldali as $kep) {
                    echo '<img src="' . $kep . '" alt="Galéria">';
                }
            ?>
        </div>

        <div class="content-box">
            <h1>Interjúk és Felvételek</h1>

            <h2>Videós összeállítások</h2>

            <div class="video-wrapper">
                <h3>Index - A zenész ott járt és onnan jött vissza, ahonnan kevesen</h3>
                <div class="video-container">
                <iframe src="https://indaplay.hu/embed/index/arutluk/a-zenesz-ott-jart-es-onnan-jott-vissza-ahonnan-kevesen" allowfullscreen></iframe>
            </div>
            </div>

            <div class="video-wrapper">
                <h3>Ismerős - Rozs Tamás portré (Pannon TV)</h3>
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/6HPqoOB29-A" allowfullscreen></iframe>
                </div>
            </div>

            <div class="video-wrapper">
                <h3>Spirit FM - Beszélgetés Rónai Egonnal (2025)</h3>
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/p8lvmRLnUAE" allowfullscreen></iframe>
                </div>
            </div>

            <h2>Írott interjúk és cikkek</h2>
            <ul class="article-list">
                <li>
                    <a href="https://kultura.hu/gyujteni-fogok-szerte-indiában-beszelgetes-rozs-tamas-zenesszel/" target="_blank" rel="noopener">"Gyűjteni fogok szerte Indiában" - Kultúra.hu</a>
                </li>
                <li>
                    <a href="https://www.szabadeuropa.hu/a/egy-dolog-nem-hianyzik-magyarorszagrol-a-gyulolkodes-meg-az-oriasplakatok-szitokszavai-interju-a-szelkialto-zenekar-zeneszevel/32912963.html" target="_blank" rel="noopener">"Nem hiányzik a gyűlölködés" - Szabad Európa</a>
                </li>
                <li>
                    <a href="https://szinhaz.online/ott-van-a-katarzis-lehetosege-interju-rozs-tamassal/" target="_blank" rel="noopener">"Ott van a katarzis lehetősége" - Színház.online</a>
                </li>
                <li>
                    <a href="https://szabadpecs.hu/2024/04/otthon-maskent-fogok-elni-ezutan-rozs-tamas-zenesz-india-igazi-arcat-de-eroszakos-fundamentalistaket-is-megismerte/" target="_blank" rel="noopener">"Otthon másként fogok élni ezután" - Szabad Pécs</a>
                </li>
            </ul>
        </div>

        <div class="side-images">
            <?php
                $jobbOldali = array_slice($osszesKep, 3, 3);
                foreach ($jobbOldali as $kep) {
                    echo '<img src="' . $kep . '" alt="Galéria">';
                }
            ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>