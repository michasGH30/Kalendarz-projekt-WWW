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
                    <h2>Najbliższe spotkania</h2>
                </header>
                <div class="meetings_n">

                    <?php
                    $ID = $_SESSION["ID"];
                    $sql = "SELECT meetings.title, meetings.date FROM meetings, meetings_members WHERE meetings_members.ID_user = $ID AND meetings_members.ID_meeting = meetings.ID AND (DAY(CURRENT_TIMESTAMP)-DAY(meetings.date)) < 0 AND (DAY(CURRENT_TIMESTAMP)-DAY(meetings.date)) >= -7";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            echo "<div class='meeting_n'>
                            <article>
                                <header>
                                    <h3>" . $row->title . "</h3>
                                    <p>
                                        Dzień: " . $row->date . "r.
                                    </p>
                                </header>
                            </article>
                        </div>";
                        }
                    } else {
                        echo "Nie masz żadnych najbliższych spotkań. Nikt cię nie zaprasza szkoda :(";
                    }

                    ?>
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