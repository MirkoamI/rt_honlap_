<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozs Tamás - Főoldal</title>
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

        .content-box h1, .content-box h2 {
            color: #2e7d32;
            border-bottom: 2px solid rgba(46, 125, 50, 0.2);
            padding-bottom: 10px;
            margin-top: 30px;
        }

        .content-box h2:first-of-type {
            margin-top: 0;
        }

        .content-box p {
            line-height: 1.6;
            color: #222;
            margin-bottom: 20px;
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
            <blockquote>
                "A zenének nincsenek határai, a növekedésének és a haladási irányának nincsenek korlátai, a kreativitásának nincsenek megszorításai. A jó zene az jó zene, függetlenül attól, hogy milyen fajta. Világéletemben utálTam a besorolásokat, mindig úgy éreztem, hogy ennek a muzsikában nincs helye." / Miles Davis /
            </blockquote>
        </div>

        <div class="content-box">
            <h2>Előadások <?php echo getAkthonap(); ?> hónapban:</h2>
            <p>
                <?php
                    $folder = date('Y');
                    $month = date('F');
                    $leirasut = 'eload/'.$folder.'/'.$month.'.txt';
                    if(file_exists($leirasut)){
                        $lines = file($leirasut, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        foreach ($lines as $line) {
                            echo htmlspecialchars($line) . "<br>";
                        }
                    } else {
                        echo "Ebben a hónapban nincs rögzített előadás.";
                    }
                ?>
            </p>

            <h2>Műsoraim:</h2>
            <p>
                <?php
                    $musorut = 'szovegek/musorok.txt';
                    echo'<ul>';
                    if(file_exists($musorut)){
                        $lines = file($musorut, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        foreach ($lines as $line) {
                            echo '<li>', htmlspecialchars($line) . "<br> </li>";
                        }
                    }
                ?>
                <li><a href="https://www.szelkialto.hu">Székiáltó koncertek</a></li>
                </ul>
            </p>

            <h2>Díjaim:</h2>
            <p>
                <?php
                    $dijakut = 'szovegek/dijak.txt';
                    if(file_exists($dijakut)){
                        $lines = file($dijakut, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        foreach ($lines as $line) {
                            echo htmlspecialchars($line) . "<br>";
                        }
                    }
                ?>
            </p>
        </div>

        <div class="side-images">
            <?php
                $jobbOldali = array_slice($osszesKep, 3,3);
                foreach ($jobbOldali as $kep) {
                    echo '<img src="' . $kep . '" alt="Galéria">';
                }
            ?>
            <blockquote>
                "Ahol a szabadság a rend, mindig érzem a  végtelent."   /József Attila/
            </blockquote>
        </div>
    </main>
    <?php include 'zene/audio.php'; ?>
    <?php include 'footer.php'; ?>
</body>
</html>