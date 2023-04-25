$("#profile_my_friends").on("click", "button", () => {
    let ID = $("button").attr("data-user");
    $.post("friend_delete_query.php", { ID_USER: "'" + ID + "'" }, function (data) {
        if (data == "success") {
            $("div#" + ID + "my_friends").css("display", "none");
        }
    })
});