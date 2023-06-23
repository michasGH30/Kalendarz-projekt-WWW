$("#delete").on("click", function () {
    let ID = $("#meeting").attr("data-user");
    let users = [];
    $(".my_friend").each(function () {
        users.push($(this).attr("data-user"));
    });

    let data_post = { IDm: ID, usersID: JSON.stringify(users) };

    $.post("delete_query.php", data_post,
        function (data) {
            console.log(data);
            window.location.href = window.location.protocol + '//' + window.location.hostname + '/index.php';
        }
    );
});