$("#submit").on("click", function () {
    let title = $("#title").val();
    let date = $("#date").val();

    let check = [];
    let data_i = [];
    $("input[type=checkbox]").each(function () {
        data_i.push($(this).attr("data-user"));
        check.push($(this).is(":checked"));
    });

    let data_post = { numberR: title, dateR: date, dataR: JSON.stringify(data_i), checked: JSON.stringify(check) };

    $.post("add_meeting_query.php", data_post,
        function (data) {
            console.log(data);
            window.location.href = 'http://localhost/projekt/index.php';
        }
    );
});