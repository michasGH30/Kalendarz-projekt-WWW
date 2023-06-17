$(document).ready(function () {
    $(".othersOnMeeting").css("display", "none");
    $("#changeVisibleFriends").on("click", function () {
        $(".friendsOnMeeting").css("display", "block");
        $(".othersOnMeeting").css("display", "none");
    });

    $("#changeVisibleOthers").on("click", function () {
        $(".friendsOnMeeting").css("display", "none");
        $(".othersOnMeeting").css("display", "block");
    });
});