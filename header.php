<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI';
    }

    header {
        height: 400px;
        width: 100%;
        background-image: url('img/csello_header.jpg'); 
        background-size: cover;
        background-position: center;
        background-color: #333;
        position: relative;
    }

    .inter {
        mix-blend-mode: multiply;
        position: fixed;
        top: 10px;
        left: 10px;
        z-index: 1000;
        display: flex;
    }

    .home img {
        height: 160px;
        mix-blend-mode: multiply;
        background: transparent;
        border: none;
        padding: 0;
        transition: transform 0.2s;
        display: block;
    }

    .home img:hover {
        transform: scale(1.1);
    }

    nav {
        background-color: #b7abab;
        padding: 15px 0;
        display: flex;
        justify-content: center;
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 10px;
        margin: 0;
        padding: 0;
    }

    .nav-links li a {
        text-decoration: none;
        color: white;
        background-color: #555;
        padding: 12px 20px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 14px;
        text-transform: uppercase;
        transition: background-color 0.2s;
        display: block;
        text-align: center;
    }

    .nav-links li a:hover {
        background-color: #333;
    }
    
    blockquote {
            font-style: italic;
            color: #4d5b4d;
            border-left: 4px solid #2e7d32;
            padding-left: 15px;
            margin: 0;
            font-size: 1.1em;
            line-height: 1.5;
    }

    @media (max-width: 800px) {
        header {
            height: 200px;
        }

        .inter {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .home img {
            height: 120px;
        }

        nav {
            padding: 10px 0;
        }

        .nav-links {
            flex-direction: column;
            width: 100%;
            align-items: center;
            gap: 5px;
        }

        .nav-links li {
            width: 90%;
        }

        .nav-links li a {
            padding: 15px;
            font-size: 16px;
        }

        .side-images {
            display: none !important;
        }

        main {
            grid-template-columns: 1fr !important;
            padding: 10px;
        }

        .content-box, .text-content, .contact-content {
            padding: 20px !important;
            margin: 0 !important;
        }
    }
</style>

<header>
    <div class="inter">
        <a href="index.php" class="home">
            <img src="img/home.png" alt="Vissza a főoldalra">
        </a>
    </div>
</header>

<nav>
    <ul class="nav-links">
        <li><a href="index.php">Kezdőlap/Main page</a></li>
        <li><a href="bemutatkozas.php">Bemutatkozás/About me</a></li>
        <li><a href="galeria.php">Galéria/Pictures-Music</a></li>
        <li><a href="koncertek.php">Előadások/Performances</a></li>
        <li><a href="kapcsolat.php">Kapcsolat/Contact</a></li>
        <li><a href="interjuk.php">Interjúk/Interviews</a></li>
    </ul>
</nav>

<?php
    if (!defined('HONAPOK')) {
        define('HONAPOK', ['január', 'február', 'március', 'április', 'május', 'június', 'július', 'augusztus', 'szeptember', 'október', 'november', 'december']);
    }

    if (!function_exists('getAktHonap')) {
        function getAktHonap() {
            $i = (int)date('n') - 1;
            return HONAPOK[$i];
        }
    }
?>