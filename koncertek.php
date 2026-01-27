<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Előadások - <?php echo date('Y'); ?></title>
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
            color: #2e7d32;
            text-align: center;
            border-bottom: 2px solid rgba(46, 125, 50, 0.2);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .month-block {
            margin-bottom: 25px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .month-block h2 {
            margin-top: 0;
            color: #1b5e20;
            font-size: 1.2em;
            text-transform: capitalize;
        }

        .month-block p {
            line-height: 1.5;
            margin-bottom: 0;
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

        <div class="content-box">
            <h1><?php echo date('Y'); ?>. évi előadások</h1>
            
            <?php
                $folder = date('Y');
                $angolHonapok = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                $magyarHonapok = ['január', 'február', 'március', 'április', 'május', 'június', 'július', 'augusztus', 'szeptember', 'október', 'november', 'december'];

                for ($i = 0; $i < 12; $i++) {
                    $leirasut = 'eload/' . $folder . '/' . $angolHonapok[$i] . '.txt';
                    
                    if (file_exists($leirasut)) {
                        echo '<div class="month-block">';
                        echo "<h2>" . $magyarHonapok[$i] . "</h2>";
                        echo "<p>";
                        $lines = file($leirasut, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        foreach ($lines as $line) {
                            echo htmlspecialchars($line) . "<br>";
                        }
                        echo "</p>";
                        echo '</div>';
                    }
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
                "Ismerd fel, hogy a fülemüle jól énekel, a kutya jól ugat, a bárány jól eszi a füvet, az ember a bárányt és a fű az emberhullát: minden a helyén van, minden tökéletesen táncolja a maga táncát és kiválóság nincsen. Az összhang teljes és megzavarhatatlan."/WeöreS/
            </blockquote>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>