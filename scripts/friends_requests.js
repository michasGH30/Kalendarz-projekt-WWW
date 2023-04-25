$("#profile_requests").on("click", ".accept_friend_button, .delete_friend_button", function () {
    let data = $(this).attr("data-info").split(",");
    data[0] = parseInt(data[0]);
    console.table(data);

    // console.log($("button").data("action"));
    // console.log($("button").attr("data-user"));
    // if (action == "accept") {
    //     $("#" + ID + "requests").css("background-color", "green");
    // }
    // else if (action == "delete") {
    //     $("#" + ID + "requests").css("background-color", "red");
    // }

    // $.post("friend_delete_query.php", { ID_USER: "'" + ID + "'" }, function (data) {
    //     if (data == "success") {
    //         $("div#" + ID + "my_friends").css("display", "none");
    //     }
    // })
});