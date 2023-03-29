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
                    <h2>Szczegóły spotkania</h2>
                </header>
                <div class="profile_tabs">
                    <div class="meeting_about">
                        <article>
                            <header>
                                <h3>Spotkanie</h3>
                            </header>
                            <div>
                                <h4>Tytuł spotkania</h4>
                                <p>
                                    Tytuł
                                </p>
                                <h4>Data spotkania</h4>
                                <p>
                                    19.03.2023 r.
                                </p>
                            </div>
                            <a href="gdzies.php" class="edit_button">Edytuj</a>
                        </article>
                    </div>
                    <div class="friends_req">
                        <article>
                            <header>
                                <h3>Uczestnicy</h3>
                            </header>
                            <div class="friends_list">
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>

                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Grzegorz Brzęczyszczykiewicz <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>

                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>

                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>

                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>

                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </main>
        <nav class="nav">
            <!-- grafika z https://makersacademy.co.za/tpl-2_31_29-.html -->
            <div class="change">
                <a class="profile"><img src="img/profile.png" alt="zdjęcie profilowe" class="profile_img" /></a>
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