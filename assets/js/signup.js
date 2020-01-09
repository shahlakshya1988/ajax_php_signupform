$(document).ready(function(){
    // alert("Hello World");
    var name = "";
    var email = "";
    var password = "";
    var confirm = "";
    var name_reg = /^[a-z ]+$/i;
    var email_reg = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/i;
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

    /*** 
    * Email Validation
    */
   $("#email").focusout(function(){
       var email_store = $(this).val().trim();
       if(email_store.length == 0 || email_store.length == ""){
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".email-error").html("Email is required");
            email = "";
       }else if(!email_reg.test(email_store)){
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".email-error").html("Proper Email is required");
            email = "";

       }else{

        /**** we will check for email in ajax request */
        $.ajax({
            type:'POST',
            url:'ajax/signup.php',
            data:{check_email:email_store},
            dataType:'JSON',
            success:function(feedback){
                        if(feedback["error"] == "email_success"){
                            alert("Success");
                        }else if(feedback["error"] == "email_fail"){
                            alert(feedback["message"]);
                        }
                        
                    }

        });
        /**** we will check for email in ajax request */
            $(this).removeClass("border-red");
            $(this).addClass("border-green");
            $(".email-error").html("");
            email=email_store;
       }
   });
   /*** 
    * Email Validation
    */
});