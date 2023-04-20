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
            <section>
                <header>
                    <h2>Moi znajomi</h2>
                </header>
                <div class="friends">
                    <div class="friends_tab">
                        <article>
                            <header>
                                <h3>Lista znajomych</h3>
                            </header>
                            <div class="friends_list" id="friends_my_friends">
                                <?php
                                $ID = $_SESSION["ID"];
                                $sql = "SELECT users.ID, users.name, users.surname, users.picture FROM users WHERE users.ID IN (SELECT friends.ID_friend from friends WHERE friends.ID_user = $ID)";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='" . $row->picture . "'";
                                    echo "alt='zdjęcie profilowe' class='friend_profile' /></p><button class='delete_friend_button'>Usuń</button></div>";
                                }
                                ?>
                            </div>

                        </article>
                    </div>
                    <div class="friends_tab">
                        <article>
                            <header>
                                <h3>Inni użytkownicy</h3>
                            </header>
                            <div class="users">
                                <?php
                                $sql = "SELECT users.ID, users.name, users.surname, users.picture FROM users WHERE users.ID NOT IN (SELECT friends.ID_friend from friends WHERE friends.ID_user = $ID) AND users.ID NOT IN (SELECT friends_request.ID_friend from friends_request WHERE friends_request.ID_user = $ID) AND users.ID != $ID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='" . $row->picture . "'";
                                    echo "alt='zdjęcie profilowe' class='friend_profile' /></p><button class='add_f_button'>Dodaj</button></div>";
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