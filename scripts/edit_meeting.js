$("#edit").on("click", function () {
    let title = $("#title").val();
    let date = $("#date").val();
    let mID = $("#mID").val();

    let check = [];
    let data_i = [];
    $("input[type=checkbox]").each(function () {
        data_i.push($(this).attr("data-user"));
        check.push($(this).is(":checked"));
    });

    let data_post = { IDSend: mID, numberR: title, dateR: date, dataR: JSON.stringify(data_i), checked: JSON.stringify(check) };

    $.post("meeting_edit_query.php", data_post,
        function (data) {
            console.log(data);
            window.location.href = window.location.protocol + '//' + window.location.hostname + '/projekt/index.php';
        }
    );
});