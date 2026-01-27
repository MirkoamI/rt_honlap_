<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bemutatkozás - Rozs Tamás</title>
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

        .text-content {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 40px;
            border-radius: 8px;
            line-height: 1.8;
            color: #222;
            font-size: 1.1em;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .text-content h1 {
            margin-top: 0;
            color: #2e7d32;
            border-bottom: 2px solid rgba(46, 125, 50, 0.2);
            padding-bottom: 10px;
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

        <div class="text-content">
            <h1>Bemutatkozás</h1>
            <?php
                $fajlUt = 'szovegek/bemutatkozas.txt';
                if (file_exists($fajlUt)) {
                    echo nl2br(htmlspecialchars(file_get_contents($fajlUt)));
                } else {
                    echo "A bemutatkozó szöveg hamarosan feltöltésre kerül.";
                }
            ?>
        </div>

        <div class="side-images">
            <?php
                $jobbOldali = array_slice($osszesKep, 3, 3);
                foreach ($jobbOldali as $kep) {
                    echo '<img src="' . $kep . '" alt="Galéria">';
                }
            ?>
            <blockquote>
                "Rajtunk kívül egyetlen társa ezen az estén a káprázatos színházi muzsikus, aki már sok színész partnere volt, annyira érti őket, hogy valósággal hozzájuk simul, Rozs Tamás. Nem csak zenél, ő is karakter, színészi képességekkel. Eljátssza, hogy elkésik, a tekintetével figyelemmel kísér mindent, együtt lélegzik a történtekkel, együtt énekel a balettmesterrel. És közben "nyüvi és nyüvi" a nagybőgőjét, amiből bármilyen zenei stílus, egész szám vagy részlet, hangfoszlány vagy zörej, mikor mire van szükség, előcsalható. Nem kísérőzenész, hanem alkotótárs."/Bóta Gábor/
            </blockquote>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>