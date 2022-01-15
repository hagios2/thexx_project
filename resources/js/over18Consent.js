/**
 * Created by valen on 13/12/2021.
 */
$(function(){
    Over18Consent.initNotice();
});

Over18Consent = function(){

};

Over18Consent.initNotice = function () {

    var lvOver18Accepted = Cookies.getJSON("over_18_accept");

    var lvOver18Modal = $("#modal_over_18_consent");

    if (!lvOver18Accepted) {
        lvOver18Modal.foundation('open');
    }

    lvOver18Modal.find("#btn_over_18_consent").on("click.over_18_accept", function () {
        lvOver18Modal.foundation('close');
        Cookies.set("over_18_accept", true, {expires: 365});
    });

};