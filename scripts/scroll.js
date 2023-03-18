$(document).ready(function () {
    let w = $(window).height();
    let f = $(".friends_list").height();
    let u = $(".users").height();
    let m = $(".meetings_n").height();
    let vh = f / w;
    // alert(vh);
    if (vh >= 0.4499) {
        $(".friends_list").css("overflow-y", "scroll");
    }
    vh = u / w;
    // alert(vh);
    if (vh >= 0.44999) {
        $(".users").css("overflow-y", "scroll");
    }
    vh = m / w;
    // alert(vh);
    if (vh >= 0.44998) {
        $(".meetings_n").css("overflow-y", "scroll");
    }
});
