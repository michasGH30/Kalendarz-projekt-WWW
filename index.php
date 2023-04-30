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
                    <?php
                    // $sql = 'SET @@lc_time_names = "pl_PL"';
                    // $conn->query($sql);
                    // $sql = "SELECT MONTHNAME(CURRENT_TIMESTAMP) as month_name FROM meetings";
                    // $result = $conn->query($sql);
                    // $row = $result->fetch_object();

                    // // ucfirst Zamiana Pierwszej Litery Na Dużą
                    // // https://stackoverflow.com/a/29166736
                    // $month_name = ucfirst($row->month_name);
                    // echo "<h2>" . $month_name . "</h2>";
                    ?>
                </div>
                <div id="right_div">
                    <a class="ar" id="rigth"><span></span></a>
                </div>
            </div>
            <section>
                <div id="days">
                    <?php
                    // $day_names = [1 => "poniedziałek", 2 => "wtorek", 3 => "środa", 4 => "czwartek", 5 => "piątek", 6 => "sobota", 0 => "niedziela"];
                    // $ID = $_SESSION["ID"];
                    // $currentDate = getdate();
                    // $mm = $currentDate["mon"];
                    // $day_count = cal_days_in_month(CAL_GREGORIAN, $currentDate["mon"], $currentDate["year"]);

                    // for ($i = 1; $i <= $day_count; $i++) {
                    //     $sql = "SELECT meetings.ID, meetings.title, meetings.date, DAYNAME(meetings.date) AS day_name FROM meetings, meetings_members WHERE meetings_members.ID_user = $ID AND meetings_members.ID_meeting = meetings.ID AND DAY(meetings.date) = $i AND MONTH(meetings.date) = $mm ORDER BY meetings.ID";
                    //     $day_to_add;
                    //     $month_to_add;
                    //     $year_to_add;

                    //     $result = $conn->query($sql);
                    //     if ($result->num_rows > 0) {
                    //         $row = $result->fetch_object();
                    //         $day_to_add = explode("-", $row->date)[2];
                    //         $month_to_add = explode("-", $row->date)[1];
                    //         $year_to_add = explode("-", $row->date)[0];
                    //         echo "<div class='day'>";
                    //         if ($row->day_name == "sobota" || $row->day_name == "niedziela") {
                    //             echo "<div class='day_name_weekend'>";
                    //         } else {
                    //             echo "<div class='day_name'>";
                    //         }
                    //         echo $row->day_name . "<br>" . $row->date . "</div>";
                    //         echo "<div class='meetings'>";
                    //         echo "<a class='meeting_details' href='meeting.php?mID=$row->ID'><div class='meeting'>" . $row->title . "</div></a>";
                    //         for ($j = 1; $j < $result->num_rows; $j++) {
                    //             $row = $result->fetch_object();
                    //             echo "<a class='meeting_details' href='meeting.php?mID=$row->ID'><div class='meeting'>" . $row->title . "</div></a>";
                    //         }
                    //         echo "</div>";
                    //     } else {
                    //         $d = date_create($currentDate["year"] . "-" . $currentDate["mon"] . "-" . $i);
                    //         echo "<div class='day'>";
                    //         if (date_format($d, "w") == 6 || date_format($d, "w") == 0) {
                    //             echo "<div class='day_name_weekend'>";
                    //         } else {
                    //             echo "<div class='day_name'>";
                    //         }
                    //         echo $day_names[date_format($d, "w")] . "<br>" . date_format($d, "Y-m-d") . "</div>";
                    //         $day_to_add = date_format($d, 'd');
                    //         $month_to_add = date_format($d, 'm');
                    //         $year_to_add = date_format($d, 'Y');
                    //     }
                    //     echo "<form action='add_meeting.php' method='post'><button class='add_meeting_button'>Dodaj spotkanie</button><input type='hidden' value='$day_to_add' name='day'><input type='hidden' value='$month_to_add' name='month'><input type='hidden' value='$year_to_add' name='year'></form></div>";
                    // }
                    ?>
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