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
                    <div class="meeting_edit_tab">
                        <article>
                            <header>
                                <h3>Usuń uczestników</h3>
                            </header>
                            <div class="friends_list">
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Grzegorz Brzęczyszczykiewicz <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="delete_friend_button">Usuń</button>
                                </div>
                            </div>

                        </article>
                    </div>

                    <div class="meeting_edit_tab">
                        <article>
                            <header>
                                <h3>Szczegóły spotkania</h3>
                            </header>
                            <div>
                                <h4>Data</h4>
                                <input type="date" name="date" id="date" value="2023-02-27"> <br>
                                <h4>Tytuł</h4>
                                <input type="text" name="title" id="title"> <br>
                                <a href="gdzies.php" class="edit_button">Edytuj</a>
                            </div>
                        </article>
                    </div>

                    <div class="meeting_edit_tab">
                        <article>
                            <header>
                                <h3>Dodaj uczestników</h3>
                            </header>
                            <div class="users">
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
                                </div>
                                <div class="my_friend">
                                    <p class="my_friend_p">Adam Kowalski <img src="img/profile.png" alt="zdjęcie profilowe" class="friend_profile" /></p>
                                    <button class="add_f_button"> Dodaj</button>
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