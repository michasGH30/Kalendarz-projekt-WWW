<?php
require("session.php");
require("db.php");
if (!isset($_SESSION['logged']))
    header("location: login.php");
if (!isset($_POST["day"])) {
    header("location: index.php");
}
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
            <section>
                <header>
                    <h2>Dodaj spotkanie</h2>
                </header>
                <div class="friends">

                    <div class="meeting_edit_tab">
                        <article>
                            <header>
                                <h3>Szczegóły spotkania</h3>
                            </header>
                            <div>
                                <form action='add_meeting_query.php' method='post'>
                                    <h4>Tytuł spotkiania</h4>
                                    <input type='text' name='title' id='title'>
                                    <h4>Data spotkania</h4>
                                    <input type='date' name='date' id='date' value='<?= $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"] ?>'>
                            </div>
                            <button class='add_meeting_button'>Dodaj spotkanie</button>
                        </article>
                    </div>

                    <div class="meeting_edit_tab" id="meeting_add_mem">
                        <article>
                            <header>
                                <h3>Dodaj uczestników</h3>
                            </header>
                            <div class="users">
                                <?php
                                $ID = $_SESSION["ID"];
                                $sql = "SELECT users.ID, users.name, users.surname FROM users WHERE users.ID !=$ID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='img/profile.png' alt='zdjęcie profilowe' class='friend_profile' /></p>
                                    <label for='$row->ID''>Dodaj</label>
                                    <input type='checkbox' name='users' value='$row->ID' id='$row->ID'>
                                </div>";
                                }
                                ?>
                            </div>

                        </article>
                    </div>
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
</body>

</html>