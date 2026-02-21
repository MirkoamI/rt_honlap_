<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapcsolat - Rozs Tamás</title>
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

        .contact-content {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 40px;
            border-radius: 8px;
            line-height: 1.6;
            color: #222;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .contact-content h1 {
            margin-top: 0;
            color: #2e7d32;
            border-bottom: 2px solid rgba(46, 125, 50, 0.2);
            padding-bottom: 10px;
        }

        .contact-section {
            margin-bottom: 25px;
        }

        .contact-section strong {
            display: block;
            color: #2e7d32;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .contact-content a {
            color: #1b5e20;
            text-decoration: none;
            transition: color 0.2s;
        }

        .contact-content a:hover {
            color: #43a047;
            text-decoration: underline;
        }

        .social-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .social-list li {
            margin-bottom: 5px;
        }

        @media (max-width: 1000px) {
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

        <div class="contact-content">
            <h1>Kapcsolat</h1>


            <div class="contact-section">
                <strong>Foglalás</strong>
                Színházak és koncerthelyek szervezőinél, ill. nálam korlátozott számban.
            </div>

            <div class="contact-section">
                <strong>Telefon</strong>
                <a href="tel:+36203592872">+36 20 359 2872</a>
            </div>

            <div class="contact-section">
                <strong>Email</strong>
                <a href="mailto:ryesharp@gmail.com">ryesharp@gmail.com</a><br>
                <a href="mailto:rozstamas495@gmail.com">rozstamas495@gmail.com</a><br>
                <a href="mailto:rozs@szelkialto.hu">rozs@szelkialto.hu</a>
            </div>

            <div class="contact-section">
                <strong>Honlapok</strong>
                <a href="http://www.rozstamus.com" target="_blank" rel="noopener">www.rozstamus.com</a><br>
                <a href="http://www.szelkialto.hu" target="_blank" rel="noopener">www.szelkialto.hu</a>
            </div>

            <div class="contact-section">
                <strong>Szerzői jogok</strong>
                Artisjus
            </div>

            <div class="contact-section">
                <strong>Elérhetőségek és közösségi háló</strong>
                <ul class="social-list">
                    <li><a href="https://www.port.hu/pls/pe/person.person?i_pers_id=131590" target="_blank" rel="noopener">Port.hu adatlap</a></li>
                    <li><a href="https://www.youtube.com/@Tam%C3%A1sRozs" target="_blank" rel="noopener">YouTube csatorna</a></li>
                    <li><a href="https://www.facebook.com/trozs1" target="_blank" rel="noopener">Facebook: Rozs Tamás</a></li>
                    <li><a href="https://www.facebook.com/RoTaMus" target="_blank" rel="noopener">Facebook: Rozs Tamás Musician</a></li>
                    <li><a href="https://soundcloud.com/trozs1" target="_blank" rel="noopener">Soundcloud: Tamás Rozs</a></li>
                </ul>
            </div>
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