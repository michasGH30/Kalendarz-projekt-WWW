<?php
require("session.php");
require("db.php");
if (!isset($_SESSION['logged']))
    header("location: login.php");
if (!isset($_GET["mID"])) {
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
                    <h2>Szczegóły spotkania</h2>
                </header>
                <div class="profile_tabs">
                    <div class="meeting_about">
                        <article>
                            <header>
                                <h3>Spotkanie</h3>
                            </header>
                            <?php
                            $mID = $_GET["mID"];
                            // $mID = 8;
                            $sql = "SELECT meetings.ID, meetings.title, meetings.date, meetings.ID_creator FROM meetings WHERE meetings.ID = $mID";
                            $result = $conn->query($sql);
                            $ID = $_SESSION["ID"];
                            while ($row = $result->fetch_object()) {
                                $date = strtotime($row->date);
                                $date_f = date('d.m.Y', $date);
                                echo "<div data-user='" . $row->ID . "'' id='meeting'>
                                        <h4>Tytuł spotkiania</h4><p>" . $row->title . "</p>
                                        <h4>Data spotkania</h4><p>" . $date_f . "</p>";
                                if ($row->ID_creator == $ID) {
                                    echo "</div><a href='meeting_edit.php?mID=$mID' class='edit_button'>Edytuj</a><br><br><button id='delete' class='delete_friend_button'>Usuń</button>";
                                } else {
                                    echo "<button id='leave' class='leave' data-meeting='$mID'>Opuść spotkanie</button>";
                                }
                            }
                            ?>
                        </article>
                    </div>
                    <div class="friends_req">
                        <article>
                            <header>
                                <h3>Uczestnicy</h3>
                            </header>
                            <div class="friends_list" id="meeting_users">

                                <?php
                                $sql = "SELECT users.ID, users.name, users.surname, users.picture FROM users WHERE users.ID IN (SELECT meetings_members.ID_user FROM meetings_members WHERE meetings_members.ID_meeting = $mID) ORDER BY users.ID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend' data-user='" . $row->ID . "'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='" . $row->picture . "'";
                                    echo "alt='zdjęcie profilowe' class='friend_profile' /></p>
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
    <script src="scripts/delete_meetings.js"></script>
    <script src="scripts/leave_meeting.js"></script>
</body>

</html>