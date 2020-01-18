$(document).ready(function(){
    // alert("I am working");
    var email = "";
    var password = "";

    $("#login-email").focusout(function(){
        var email_store = $("#login-email").val().trim();
        if(email_store.length == "" || email_store.length == 0){
            $("#login-email").removeClass("border-green");
            $("#login-email").addClass("border-red");
            $(".login-email-error").html("Email Is Required");
            email = "";
        }else{
            $(".login-email-error").html("");
            $("#login-email").removeClass("border-red");
            $("#login-email").addClass("border-green");
            email = email_store; // we are going to check this in db so no futher is requied
        }
    });
    $("#login-password").focusout(function(){
        var password_store = $("#login-password").val().trim();
        if(password_store.length == "" || password_store.length == 0){
            $("#login-password").removeClass("border-green");
            $("#login-password").addClass("border-red");
            $(".login-password-error").html("Password Is Required");
            password = "";
        }else{
            $("#login-password").removeClass("border-red");
            $("#login-password").addClass("border-green");
            $(".login-password-error").html(" ");
            password = password_store;
        }
    });
});