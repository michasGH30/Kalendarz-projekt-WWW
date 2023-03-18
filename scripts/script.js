let visible = false;
$(".change").click(function () {
    if (visible) {
        $(".options").animate({ opacity: "0" });
        $(".options").css("display", "none");
        visible = false;
    }
    else if (!visible) {
        $(".options").css("display", "block");
        $(".options").animate({ opacity: "1" });
        visible = true;
    }
});

