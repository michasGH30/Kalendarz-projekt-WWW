$(document).ready(function () {
    $(".othersOnMeeting").css("display", "none");
    $("#changeVisibleFriends").on("click", function () {
        $(".friendsOnMeeting").css("display", "block");
        $(".othersOnMeeting").css("display", "none");
        $(this).attr("disabled", true);
        $("#changeVisibleOthers").attr("disabled", false);
    });

    $("#changeVisibleOthers").on("click", function () {
        $(".friendsOnMeeting").css("display", "none");
        $(".othersOnMeeting").css("display", "block");
        $(this).attr("disabled", true);
        $("#changeVisibleFriends").attr("disabled", false);
    });
});