/**
 * Created by valen on 13/12/2021.
 */

UserPageStrem = function () {
};

UserPageStrem.goPrivate = function () {
    let btn_go_private = $("#btn_user_go_private");
    let btn_leave_private = $("#btn_user_leave_private_show");

    if (confirm("Do you wish to join the private show for X tokens for 10 minutes?")) {
        btn_go_private.closest("li").fadeOut(500, function () {
            $(this).addClass("hide");
            btn_leave_private.closest("li").fadeIn("500").removeClass("hide");
        });
    }
};

UserPageStrem.leavePrivate = function () {
    let btn_go_private = $("#btn_user_go_private");
    let btn_leave_private = $("#btn_user_leave_private_show");

    btn_leave_private.closest("li").fadeOut(500, function () {
        $(this).addClass("hide");
        btn_go_private.closest("li").fadeIn("500").removeClass("hide");
    });

};
