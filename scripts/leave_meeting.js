$("#leave").on("click", function () {
    let mID = $("#leave").attr("data-meeting");
    $.post("leave_meeting_query.php", { IDmeeting: mID }, function (data) {
        console.log(data);
        window.location.href = 'http://localhost/projekt/index.php';
    });
})