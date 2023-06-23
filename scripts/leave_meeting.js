$("#leave").on("click", function () {
    let mID = $("#leave").attr("data-meeting");
    $.post("leave_meeting_query.php", { IDmeeting: mID }, function (data) {
        console.log(data);
        window.location.href = window.location.protocol + '//' + window.location.hostname + '/projekt/index.php';
    });
})