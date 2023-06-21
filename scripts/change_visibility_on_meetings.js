$(document).ready(function () {
    $(".othersOnMeeting").css("display", "none");
    $("#changeVisibleFriends").on("click", function () {
        $(".friendsOnMeeting").css("display", "block");
        $(".othersOnMeeting").css("display", "none");
        $("#who").text("Znajomi");
    });

    $("#changeVisibleOthers").on("click", function () {
        $(".friendsOnMeeting").css("display", "none");
        $(".othersOnMeeting").css("display", "block");
        $("#who").text("Inni");
    });
});