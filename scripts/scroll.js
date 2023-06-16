$(document).ready(function () {
    let w = $(window).height();
    let fmf = $("#friends_my_friends").height();
    // let f_req = $(".friends_tab").height();
    let pr = $("#profile_requests").height();
    let pmf = $("#profile_my_friends").height();
    let mu = $("#meeting_users").height();
    // let u = $(".users").height();
    let m = $(".meetings_n").height();
    let d = $("#days").height();
    let mam = $("#meeting_add_mem").height();
    // let pam = $("#pam").height();

    let met = $("#meeting_e_tab").height();
    let vh = fmf / w;
    // alert(vh);
    if (vh >= 0.36) {
        $("#friends_my_friends").css("overflow-y", "scroll");
    }
    // vh = f_req / w;
    // alert(vh);
    // if (vh >= 0.36) {
    //     $(".friends_tab").css("overflow-y", "scroll");
    // }
    vh = pr / w;
    // alert(vh);
    if (vh >= 0.36) {
        $("#profile_requests").css("overflow-y", "scroll");
    }
    vh = pmf / w;
    // alert(vh);
    if (vh >= 0.3) {
        $("#profile_my_friends").css("overflow-y", "scroll");
    }
    // vh = u / w;
    // if (vh >= 0.35) {
    //     $(".users").css("overflow-y", "scroll");
    // }
    vh = m / w;
    // alert(vh);
    if (vh >= 0.35) {
        $(".meetings_n").css("overflow-y", "scroll");
    }
    // vh = pam / w;
    // // alert(vh);
    // if (vh >= 0.3) {
    //     $("#pam").css("overflow-y", "scroll");
    // }
    vh = mu / w;
    // alert(vh);
    if (vh >= 0.35) {
        $("#meeting_users").css("overflow-y", "scroll");
    }

    vh = met / w;
    // alert(vh);
    if (vh >= 0.35) {
        $("#meeting_e_tab").css("overflow-y", "scroll");
    }

    vh = mam / w;
    // alert(vh);
    if (vh >= 0.35) {
        $("#meeting_add_mem").css("overflow-y", "scroll");
    }
});
