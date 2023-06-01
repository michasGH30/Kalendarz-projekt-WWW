$("#friends_my_friends").delegate("button", "click", function () {
    let ID = $(this).attr("data-user");
    $.post("friend_delete_query.php", { ID_USER: "'" + ID + "'" }, function (data) {
        if (data == "success") {
            $("div#" + ID + "my_friends").remove();
        }
    })
});