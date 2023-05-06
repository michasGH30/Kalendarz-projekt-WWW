<?php
require("session.php");
require("db.php");
if (!isset($_SESSION['logged']))
    header("location: login.php");
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalendarz</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/buttons.css" />
    <link rel="stylesheet" href="style/scrollbar.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <main class="main">
            <header class="header">
                <a href="index.php" class="header_link">
                    <h1>Kalendarz</h1>
                </a>
            </header>
            <div class="arrows">
                <div id="left_div">
                    <a class="al" id="left"><span></span></a>
                </div>

                <div>
                    <h2 id="month_name"></h2>

                </div>
                <div id="right_div">
                    <a class="ar" id="rigth"><span></span></a>
                </div>
            </div>
            <section>
                <div id="days">

                </div>
            </section>
        </main>
        <nav class="nav">
            <!-- grafika z https://makersacademy.co.za/tpl-2_31_29-.html -->
            <div class="change">
                <a class="profile"><img src="<?= $_SESSION["img_path"] ?>" alt="zdjęcie profilowe" class="profile_img" /></a>
            </div>
            <div class="options">
                <a href="profile.php" class="option">Mój profil</a>
                <a href="nearest.php" class="option">Najbliższe spotkania</a>
                <a class="option" href="friends.php">Moi znajomi</a>
                <a class="option" href="logout.php">Wyloguj</a>
            </div>
        </nav>
    </div>

    <footer class="footer">
        <p>
            Strona wykonana przez <a href="https://github.com/michasGH30?tab=repositories" target="_blank">Michał Żuk</a> &copy; <?= date("Y") ?>.
        </p>
    </footer>
    <script src="scripts/script.js"></script>
    <script src="scripts/scroll.js"></script>
    <script src="scripts/index_meetings.js"></script>
</body>

</html>