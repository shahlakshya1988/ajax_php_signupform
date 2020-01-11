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
            $.ajax({
                type: 'POST',
                url: 'ajax/signup.php',
                data: {
                    check_email: email_store
                },
                dataType: 'JSON',
                beforeSend: function () {
                    $(".email-error").html('<i class="fa fa-spinner fa-pluse fa-1x fa-fw"></i>');
                },
                success: function (feedback) {
                    setTimeout(function () {
                        if (feedback["error"] == "email_success") {
                            $(this).removeClass("border-red");
                            $(this).addClass("border-green");
                            $(".email-error").html("<div class='text-success'><i class='fa fa-check-circle'></i> Available</div>");
                            email = email_store;
                        } else if (feedback["error"] == "email_fail") {
                            $(this).removeClass("border-green");
                            $(this).addClass("border-red");
                            $(".email-error").html("Sorry this email already exists!");
                            email = "";
                        }
                    }, 3000);


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
                $(".password-error").html("Password Should Be Mininum 8 Chars, Have One Capital, small-case, Number");
                $("#password").addClass("border-red");
                $("#password").removeClass("border-green");
                password = '';
            }else{
                $(this).removeClass("border-red");
                $(this).addClass("border-green");
                $(".password-error").html("");
                password = password_store;
            }
        });

      /*** 
     * Password Validation
     */
});
