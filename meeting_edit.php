<?php
require("session.php");
require("db.php");
if (!isset($_SESSION['logged']))
    header("location: login.php");
// if (!isset($_GET["mID"])) {
//     header("location: index.php");
// }
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalendarz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <h2>Edytuj spotkanie</h2>
                </header>
                <div class="friends">
                    <div class="meeting_edit_tab" id="meeting_e_tab">
                        <article>
                            <header>
                                <h3>Usuń uczestników</h3>
                            </header>
                            <div class="friends_list">
                                <?php
                                // $mID = $_GET["mID"];
                                $mID = 8;
                                $ID = $_SESSION["ID"];
                                $sql = "SELECT users.ID, users.name, users.surname, users.picture FROM users WHERE users.ID IN (SELECT meetings_members.ID_user FROM meetings_members WHERE meetings_members.ID_meeting = $mID) AND users.ID !=$ID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='" . $row->picture . "'";
                                    echo "alt='zdjęcie profilowe' class='friend_profile' /></p>
                                    <button class='delete_friend_button'>Usuń</button>
                                </div>";
                                }

                                ?>
                            </div>

                        </article>
                    </div>

                    <div class="meeting_edit_tab">
                        <article>
                            <header>
                                <h3>Szczegóły spotkania</h3>
                            </header>
                            <div>
                                <?php

                                $sql = "SELECT meetings.title, meetings.date FROM meetings WHERE meetings.ID = $mID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {

                                    echo "<div>
                                        <form action='meeting_edit_query.php' method='post'>
                                        <h4>Tytuł spotkiania</h4> <input type='text' name='title' id='title'value='" . $row->title . "'>
                                        <h4>Data spotkania</h4><input type='date' name='date' id='date' value='" . $row->date . "'></div><button class='edit_button'>Edytuj</button>";
                                }
                                ?>
                            </div>
                        </article>
                    </div>

                    <div class="meeting_edit_tab" id="meeting_add_mem">
                        <article>
                            <header>
                                <h3>Dodaj uczestników</h3>
                            </header>
                            <div class="users">
                                <?php
                                // $mID = $_GET["mID"];
                                $mID = 8;
                                $ID = $_SESSION["ID"];
                                $sql = "SELECT users.ID, users.name, users.surname FROM users WHERE users.ID NOT IN (SELECT meetings_members.ID_user FROM meetings_members WHERE meetings_members.ID_meeting = $mID) AND users.ID !=$ID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='img/profile.png' alt='zdjęcie profilowe' class='friend_profile' /></p>
                                    <button class='add_f_button'>Dodaj</button>
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
            Strona wykonana przez <a href="https://github.com/michasGH30?tab=repositories" target="_blank">Michał Żuk</a> &copy; 2023.
        </p>
    </footer>
    <script src="scripts/script.js"></script>
    <script src="scripts/scroll.js"></script>
</body>

</html>