$("#profile_requests").on("click", ".accept_friend_button, .delete_friend_button", function () {
    let data = $(this).attr("data-info").split(",");
    data[0] = parseInt(data[0]);

    if (data[1] == "accept") {
        $("#" + data[0] + "requests .accept_friend_button").remove();
        $("#" + data[0] + "requests .delete_friend_button").removeAttr("data-info");
        $("#" + data[0] + "requests .delete_friend_button").attr("data-user", data[0]);
        $($("#" + data[0] + "requests").clone().attr("id", data[0] + "my_friends")).appendTo("#profile_my_friends");
        $.post("friends_requests_accept.php", { ID_USER: data[0], ACTION: data[1] }, function (dane) {
            console.log(dane);
        })
    }
    else {
        $.post("friends_requests_delete.php", { ID_USER: data[0], ACTION: data[1] }, function (dane) {
            console.log(dane);
        })
    }
    $("#" + data[0] + "requests").remove();
});