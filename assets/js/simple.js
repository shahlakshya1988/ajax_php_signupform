$(document).ready(function(){
    $("#login").click(function(){
        $(".signup-cover").hide();
        $(".login-cover").show();
    });
    $("#signup").click(function(){
        $(".signup-cover").show();
        $(".login-cover").hide();
    });
    $(".success-area").fadeOut(0);
    $(".success-area").fadeIn(5000);

});