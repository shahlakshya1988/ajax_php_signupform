$(document).ready(function(){
    // alert("Hello World");
    var name = "";
    var email = "";
    var password = "";
    var confirm = "";
    var name_reg = /^[a-z ]+$/i;
    /****  ==== NAME VALIDATION ==== */
    $("#name").focusout(function(){
        // alert("input name");
        var store = $("#name").val().trim();
        if(store.length == 0 || store.length==""){
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".name-error").html("Name is required");
            name="";
        }else if(!name_reg.test(store)){ 
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".name-error").html("Numbers, Special Chars Are Not Allowed");
            name="";

        }else{
            // alert(store);
            $(this).removeClass("border-red");
            $(this).addClass("border-green");
            $(".name-error").html("");
            name=store;
        }
    });
    /****  ==== NAME VALIDATION ==== */
});