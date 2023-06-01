$(".users").on("click", ".add_f_button", function () {
    let data_button = $(this).attr("data-user");
    $.post("friend_add_query.php", { ID_USER: "'" + data_button + "'" }, function (data) {
        console.log(data);
        if (data == "success") {
            $("#" + data_button + "add").remove();
        }
    });
});