$(document).ready(function(){
    // alert("Hello World");
    var name = "";
    var email = "";
    var password = "";
    var confirm = "";

    $("#name").focusout(function(){
        // alert("input name");
        var store = $("#name").val().trim();
        if(store.length == 0 || store.length==""){
            $(this).addClass("border-red");
            $(".name-error").html("Name is required");
            name="";
        }else{
            // alert(store);
            $(this).removeClass("border-red");
            $(".name-error").html("");
            name=store;
        }
    });
});