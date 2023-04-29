<?php
include("session.php");
include("db.php");
if (!isset($_SESSION["mm"]) || !isset($_SESSION["yy"])) {
    $currentDate = getdate();
    $_SESSION["mm"] = $currentDate["mon"];
    $_SESSION["yy"] = $currentDate["year"];
}

$day_names = [1 => "poniedziałek", 2 => "wtorek", 3 => "środa", 4 => "czwartek", 5 => "piątek", 6 => "sobota", 0 => "niedziela"];
$ID = $_SESSION["ID"];
$mm = $_SESSION["mm"];
$yy = $_SESSION["yy"];
$day_count = cal_days_in_month(CAL_GREGORIAN, $mm, $yy);

for ($i = 1; $i <= $day_count; $i++) {
    $sql = "SELECT meetings.ID, meetings.title, meetings.date, DAYNAME(meetings.date) AS day_name FROM meetings, meetings_members WHERE meetings_members.ID_user = $ID AND meetings_members.ID_meeting = meetings.ID AND DAY(meetings.date) = $i AND MONTH(meetings.date) = $mm ORDER BY meetings.ID";
    $day_to_add;
    $month_to_add;
    $year_to_add;

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        $day_to_add = explode("-", $row->date)[2];
        $month_to_add = explode("-", $row->date)[1];
        $year_to_add = explode("-", $row->date)[0];
        echo "<div class='day'>";
        if ($row->day_name == "sobota" || $row->day_name == "niedziela") {
            echo "<div class='day_name_weekend'>";
        } else {
            echo "<div class='day_name'>";
        }
        echo $row->day_name . "<br>" . $row->date . "</div>";
        echo "<div class='meetings'>";
        echo "<a class='meeting_details' href='meeting.php?mID=$row->ID'><div class='meeting'>" . $row->title . "</div></a>";
        for ($j = 1; $j < $result->num_rows; $j++) {
            $row = $result->fetch_object();
            echo "<a class='meeting_details' href='meeting.php?mID=$row->ID'><div class='meeting'>" . $row->title . "</div></a>";
        }
        echo "</div>";
    } else {
        $d = date_create($yy . "-" . $mm . "-" . $i);
        echo "<div class='day'>";
        if (date_format($d, "w") == 6 || date_format($d, "w") == 0) {
            echo "<div class='day_name_weekend'>";
        } else {
            echo "<div class='day_name'>";
        }
        echo $day_names[date_format($d, "w")] . "<br>" . date_format($d, "Y-m-d") . "</div>";
        $day_to_add = date_format($d, 'd');
        $month_to_add = date_format($d, 'm');
        $year_to_add = date_format($d, 'Y');
    }
    echo "<form action='add_meeting.php' method='post'><button class='add_meeting_button'>Dodaj spotkanie</button><input type='hidden' value='$day_to_add' name='day'><input type='hidden' value='$month_to_add' name='month'><input type='hidden' value='$year_to_add' name='year'></form></div>";
}
