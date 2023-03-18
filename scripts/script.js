let visible = false;
$(".change").click(function () {
    if (visible) {
        // https://stackoverflow.com/a/6116775
        $(".options").animate({ opacity: "0" }, function () {
            $(".options").css("display", "none");
        });

        visible = false;
    }
    else if (!visible) {
        $(".options").css("display", "block");
        $(".options").animate({ opacity: "1" });
        visible = true;
    }
});