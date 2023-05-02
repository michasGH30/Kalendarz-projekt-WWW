$(document).ready(function () {
    $.ajax({
        url: "index_meetings_data.php",
        success: function (data) {
            // console.log("\nDane na załadowaniu: " + data);
            $("#days").html(data);
        }
    });
    $.ajax({
        url: "index_month_name.php",
        success: function (data) {
            // console.log("\nDane na załadowaniu: " + data);
            $("#month_name").html(data);
        }
    });
});

$("#right_div").on("click", function () {
    $.post("index_month_inc.php", { ID_USER: "aaa" }, function (data) {
        // console.log("\nDane po wywołaniu kliknięcia: " + data);
    });
    $.ajax({
        url: "index_meetings_data.php",
        success: function (data) {
            // console.log("\nDane po wywołaniu kliknięcia i funkcji ajax: " + data);
            $("#days").html(data);
        }
    });
    $.ajax({
        url: "index_month_name.php",
        success: function (data) {
            // console.log("\nDane na załadowaniu: " + data);
            $("#month_name").html(data);
        }
    });
});

$("#left_div").on("click", function () {
    $.post("index_month_dec.php", { ID_USER: "aaa" }, function (data) {
        // console.log("\nDane po wywołaniu kliknięcia: " + data);
    });
    $.ajax({
        url: "index_meetings_data.php",
        success: function (data) {
            // console.log("\nDane po wywołaniu kliknięcia i funkcji ajax: " + data);
            $("#days").html(data);
        }
    });
    $.ajax({
        url: "index_month_name.php",
        success: function (data) {
            // console.log("\nDane na załadowaniu: " + data);
            $("#month_name").html(data);
        }
    });
});