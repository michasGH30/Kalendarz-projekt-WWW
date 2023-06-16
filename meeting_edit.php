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
    <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
                                <h3>Szczegóły spotkania</h3>
                            </header>
                            <div>
                                <?php
                                $mID = $_GET["mID"];
                                $ID = $_SESSION["ID"];
                                $sql = "SELECT meetings.title, meetings.date FROM meetings WHERE meetings.ID = $mID";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {

                                    echo "<div>
                                            <input type='hidden' value='$mID' id='mID'>
                                            <h4>Tytuł spotkiania</h4>
                                            <input type='text' name='title' id='title'value='" . $row->title . "'>
                                            <h4>Data spotkania</h4>
                                            <input type='date' name='date' id='date' value='" . $row->date . "'>
                                        </div>
                                        <button class='edit_button' id='edit'>Edytuj</button>";
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
                                <div>
                                    <button id="changeVisibleFriends" disabled>Pokaż znajomych</button>
                                    <button id="changeVisibleOthers">Pokaż innych</button>
                                </div>
                                <?php
                                $sql = "SELECT users.ID, users.name, users.surname, users.picture FROM users WHERE users.ID !=$ID AND users.ID IN (SELECT friends.ID_friend FROM friends WHERE friends.ID_user = $ID)";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend friendsOnMeeting'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='" . $row->picture . "'";
                                    echo "alt='zdjęcie profilowe' class='friend_profile' /></p>
                                    <label for='$row->ID''>Uczestnik</label>
                                    <input type='checkbox' name='users' data-user='" . $row->ID . "' id='$row->ID'";
                                    $member = $conn->query("SELECT ID FROM meetings_members WHERE meetings_members.ID_meeting = $mID AND meetings_members.ID_user = $row->ID");
                                    if ($member->num_rows > 0) {
                                        echo "checked";
                                    }
                                    echo "></div>";
                                }
                                $sql = "SELECT users.ID, users.name, users.surname, users.picture FROM users WHERE users.ID !=$ID AND users.ID NOT IN(SELECT friends.ID_friend FROM friends WHERE friends.ID_user = $ID)";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_object()) {
                                    echo "<div class='my_friend othersOnMeeting'>
                                    <p class='my_friend_p'>" . $row->name . " " . $row->surname . "<img src='" . $row->picture . "'";
                                    echo "alt='zdjęcie profilowe' class='friend_profile' /></p>
                                    <label for='$row->ID''>Uczestnik</label>
                                    <input type='checkbox' name='users' data-user='" . $row->ID . "' id='$row->ID'";
                                    $member = $conn->query("SELECT ID FROM meetings_members WHERE meetings_members.ID_meeting = $mID AND meetings_members.ID_user = $row->ID");
                                    if ($member->num_rows > 0) {
                                        echo "checked";
                                    }
                                    echo "></div>";
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
    <script src="scripts/change_visibility_on_meetings.js"></script>
    <script src="scripts/edit_meeting.js"></script>
</body>

</html>