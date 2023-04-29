$(document).ready(function () {
    $.ajax({
        url: "test_a.php",
        success: function (data) {
            // console.log("\nDane na załadowaniu: " + data);
            $("#days").html(data);
        }
    });
});

$("#right_div").on("click", function () {
    $.post("test_query.php", { ID_USER: "aaa" }, function (data) {
        console.log("\nDane po wywołaniu kliknięcia: " + data)
        $.ajax({
            url: "test_a.php",
            success: function (data) {
                console.log("\nDane po wywołaniu kliknięcia i funkcji ajax: " + data);
                $("#days").html(data);
            }
        });
    })
});