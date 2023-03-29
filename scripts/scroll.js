$(document).ready(function () {
    let w = $(window).height();
    let fmf = $("#friends_my_friends").height();
    let pr = $("#profile_requests").height();
    let pmf = $("#profile_my_friends").height();
    let u = $(".users").height();
    let m = $(".meetings_n").height();
    let vh = fmf / w;
    // alert(vh);
    if (vh >= 0.399) {
        $("#friends_my_friends").css("overflow-y", "scroll");
    }
    vh = pr / w;
    if (vh >= 0.399) {
        $("#profile_requests").css("overflow-y", "scroll");
    }
    vh = pmf / w;
    if (vh >= 0.399) {
        $("#profile_my_friends").css("overflow-y", "scroll");
    }
    vh = u / w;
    // alert(vh);
    if (vh >= 0.399) {
        $(".users").css("overflow-y", "scroll");
    }
    vh = m / w;
    // alert(vh);
    if (vh >= 0.399) {
        $(".meetings_n").css("overflow-y", "scroll");
    }
});
