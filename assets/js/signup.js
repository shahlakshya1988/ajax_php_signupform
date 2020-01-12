$(document).ready(function () {
    // alert("Hello World");
    var name = "";
    var email = "";
    var password = "";
    var confirm = "";
    var name_reg = /^[a-z ]+$/i;
    var email_reg = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+\.[a-z]+$/i;
    var password_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
    /****  ==== NAME VALIDATION ==== */
    $("#name").focusout(function () {
        // alert("input name");
        var store = $("#name").val().trim();
        if (store.length == 0 || store.length == "") {
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".name-error").html("Name is required");
            name = "";
        } else if (!name_reg.test(store)) {
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".name-error").html("Numbers, Special Chars Are Not Allowed");
            name = "";

        } else {
            // alert(store);
            $(this).removeClass("border-red");
            $(this).addClass("border-green");
            $(".name-error").html("");
            name = store;
        }
    });
    /****  ==== NAME VALIDATION ==== */

    /*** 
     * Email Validation
     */
    $("#email").focusout(function () {
        var email_store = $(this).val().trim();
        if (email_store.length == 0 || email_store.length == "") {
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".email-error").html("Email is required");
            email = "";
        } else if (!email_reg.test(email_store)) {
            $(this).removeClass("border-green");
            $(this).addClass("border-red");
            $(".email-error").html("Proper Email is required");
            email = "";

        } else {

            /**** we will check for email in ajax request */
           //alert(email_store);
            $.ajax({
                type: 'POST',
                url: 'ajax/signup.php',
                data: {
                    check_email: email_store
                },
                dataType: 'JSON',
                beforeSend: function () {
                    $(".email-error").html('<i class="fa fa-spinner fa-pluse fa-1x fa-fw"></i>');
                    //alert(email_store);
                },
                success: function (feedback) {
                    //alert(feedback);
                    //console.log(feedback);
                   if (feedback["error"] == "email_success") {
                       $("#email").removeClass("border-red");
                       $("#email").addClass("border-green");
                       $(".email-error").html("<div class='text-success'><i class='fa fa-check-circle'></i> Available</div>");
                       email = email_store;
                   } else if (feedback["error"] == "email_fail") {
                       $("#email").removeClass("border-green");
                       $("#email").addClass("border-red");
                       $(".email-error").html("Sorry this email already exists!");
                       email = "";
                   }


                }

            });
            /**** we will check for email in ajax request */

           

        }
    });
    /*** 
     * Email Validation
     */

      /*** 
     * Password Validation
     */
        $("#password").focusout(function(){
            var password_store = $(this).val().trim();
            if(password_store.length == '' || password_store.length == 0){
                $(".password-error").html("Password Required");
                $("#password").addClass("border-red");
                $("#password").removeClass("border-green");
                password = '';
            }else if(!password_reg.test(password_store)){
                $(".password-error").html("Password Should Be Mininum 8 Chars, Have One Capital, One Lower and One Number");
                $("#password").addClass("border-red");
                $("#password").removeClass("border-green");
                password = '';
            }else{
                $(this).removeClass("border-red");
                $(this).addClass("border-green");
                $(".password-error").html("<div class='text-success'><i class='fa fa-check-circle'>Your Password Is Strong</i></div>");
                password = password_store;
            }
        });

      /*** 
     * Password Validation
     */
    /***


    /**
     * Confirm Password Validation
     */
    $("#confirm").focusout(function(){
        var confirm_store = $(this).val().trim();
        if(confirm_store.length == "" || confirm_store.length == 0){
            $(".confirm-error").html("Confirm Password Required");
            $("#confirm").addClass("border-red");
            $("#confirm").removeClass("border-green");
            confirm = "";
        }else if(confirm_store != password){
            $(".confirm-error").html("Confirm Password and Password Should Be Same");
            $("#confirm").addClass("border-red");
            $("#confirm").removeClass("border-green");
            confirm = "";
        }else{
            $(this).removeClass("border-red");
            $(this).addClass("border-green");
            $(".confirm-error").html("<div class='text-success'><i class='fa fa-check-circle'>Your Password Is Strong</i></div>");
            confirm = confirm_store;
        }

    });

    /**
     * Confirm Password Validation
     */
    /**
     * submiting the form
     */
    $("#submit").click(function(e){
        e.preventDefault();
        if(name.trim() == ""){
            $("#name").removeClass("border-green");
            $("#name").addClass("border-red");
            $(".name-error").html("Enter Proper Name");
          

        } else {
            // alert(store);
            $("#name").removeClass("border-red");
            $("#name").addClass("border-green");
            $(".name-error").html("");
        }
        if(email.trim() == ""){
            $("#email").removeClass("border-green");
            $("#email").addClass("border-red");
            $(".email-error").html("Enter Proper Email Address");
           

        } else {
            // alert(store);
            $("#email").removeClass("border-red");
            $("#email").addClass("border-green");
            $(".email-error").html("");
        }
        if(password.trim() == ""){
            $("#password").removeClass("border-green");
            $("#password").addClass("border-red");
            $(".password-error").html("Enter Proper Password");
           

        } else {
            // alert(store);
            $("#password").removeClass("border-red");
            $("#password").addClass("border-green");
            $(".password-error").html("");
        }
        if(confirm.trim() == ""){
            $("#confirm").removeClass("border-green");
            $("#confirm").addClass("border-red");
            $(".confirm-error").html("Enter Proper Password");
            

        } else {
            // alert(store);
            $("#confirm").removeClass("border-red");
            $("#confirm").addClass("border-green");
            $(".confirm-error").html("");
        }
        //console.log(name.trim() != "");
        //console.log( email.trim() != "");
        //console.log( password.trim()!= "");
        //console.log( confirm.trim()!="");
        //console.log($("#singupSubmit").serialize());
        
        if(name.trim() != "" && email.trim() != "" && password.trim()!= "" && confirm.trim()!=""){
           // alert("Request");
            $.ajax({
                type:"POST",
                 url:"ajax/signup.php?signup=true",
                data:$("#singupSubmit").serialize(),   
                dataType:"JSON",            
                success:function(data){
                    alert("Working");
                    alert(data);
                            console.log(data);
                        }
            });
        }
    });
    /**
     * submiting the form
     */
});
