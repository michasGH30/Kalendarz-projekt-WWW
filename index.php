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
                <div>
                    <a class="al" id="left"><span></span></a>
                </div>

                <div>
                    <?php
                    $sql = 'SET @@lc_time_names = "pl_PL"';
                    $conn->query($sql);
                    $sql = "SELECT MONTHNAME(CURRENT_TIMESTAMP) as month_name FROM meetings ";
                    $result = $conn->query($sql);
                    $row = $result->fetch_object();

                    // ucfirst Zamiana Pierwszej Litery Na Dużą
                    // https://stackoverflow.com/a/29166736
                    $month_name = ucfirst($row->month_name);
                    echo "<h2>" . $month_name . "</h2>";
                    ?>
                </div>
                <div>
                    <a class="ar" id="rigth"><span></span></a>
                </div>
            </div>
            <section>
                <div id="days" style="display: flex;">
                    <?php
                    $ID = $_SESSION["ID"];
                    $currentDate = getdate();
                    $mm = $currentDate["mon"];
                    $day_count = cal_days_in_month(CAL_GREGORIAN, $currentDate["mon"], $currentDate["year"]);

                    for ($i = 1; $i <= $day_count; $i++) {
                        $sql = "SELECT meetings.ID, meetings.title, meetings.date, DAYNAME(meetings.date) AS day_name FROM meetings, meetings_members WHERE meetings_members.ID_user = $ID AND meetings_members.ID_meeting = meetings.ID AND DAY(meetings.date) = $i AND MONTH(meetings.date) = $mm ORDER BY meetings.ID";

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_object();
                            echo "<div class='day'><div class='day_name'>" . $row->day_name . "<br>" . $row->date . "</div><div class='meetings'>";
                            echo "<div class='meeting'>" . $row->title . "</div>";
                            for ($j = 1; $j < $result->num_rows; $j++) {
                                $row = $result->fetch_object();
                                echo "<div class='meeting'>" . $row->title . "</div>";
                            }
                            echo "</div></div>";
                        }
                    }
                    ?>
                    <!-- <div class="row"> 
                        <div class="before">
                            <div class="day_name">Dzień tygodnia <br> 10-12-2022</div>
                            <div class="meetings">
                                <div class="meeting_b">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                        <div class="day">
                            <div class="day_name_weekend">Dzień tygodnia</div>
                            <div class="meetings">
                                <div class="meeting">Spotkanie</div>
                            </div>
                        </div>
                    </div> -->
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