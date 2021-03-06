function add_bio(bio){
   var bio=bio.trim();
   if(bio.length == 0 || bio.length == ""){
        $(".bio-error").html("Bio Can't Be Empty");
        $("#bio_textarea").addClass("border-red");
        $("#bio_textarea").removeClass("border-green");
        
   }else{
        // ajax_request over here
        $.ajax({
            url:"ajax/profile.php?bio=true",
            data:$("#bio_form").serialize(),
            type:"POST",
            dataType:"JSON",
            beforeSend:function(){
               // console.log("STarted");
            },
            success:function(feedback){
                console.log(feedback);
                if(feedback["error"]=="success"){
                    location = "index.php";
                }else{
                    // alert("Sorry");
                }
            }
        });
        // ajax_request over here
   }
   return false;
}

function add_facebook(facebook){
    facebook = facebook.trim();
    facebook_pattern = /^(http|https)\:(\/\/)(www)\.facebook\.(com)\/[a-zA-Z0-9]+$/;
    if(facebook.length == "" || facebook.length == 0){
        $(".facebook-error").html("Facebook Link Can't Be Empty");
        $("#facebook_input").addClass("border-red");
        $("#facebook_input").removeClass("border-green");
    }else if(!facebook_pattern.test(facebook)){
        $(".facebook-error").html("Facebook Link Not Valid");
        $("#facebook_input").addClass("border-red");
        $("#facebook_input").removeClass("border-green");
        $("#facebook_input").val("");
    }else{
        $(".facebook-error").html(" ");
        $("#facebook_input").removeClass("border-red");
        $("#facebook_input").addClass("border-green");
        $.ajax({
            url:"ajax/profile.php?facebook=true",
            type:"POST",
            data:$("#update_facebook_form").serialize(),
            dataType:"JSON",
            beforeSend:function(){
               // console.log("I am Running");
            },
            success:function(feedback){
                if(feedback["error"]=="success"){
                    location="index.php";
                }
            }
        });
    }
    return false;
}

function add_linkedin(linkedin){
    linkedin = linkedin.trim();
    linkedin_pattern = /^(http|https)\:(\/\/)(www)\.linkedin\.(com)\/[a-zA-Z0-9]+$/;
    if(linkedin.length == "" || linkedin.length == 0){
        $(".linkedin-error").html("Linkedin Link Can't Be Empty");
        $("#linkedin_input").addClass("border-red");
        $("#linkedin_input").removeClass("border-green");
    }else if(!linkedin_pattern.test(linkedin)){
        $(".linkedin-error").html("Linkedin Link Can't Be Empty");
        $("#linkedin_input").addClass("border-red");
        $("#linkedin_input").removeClass("border-green");
    }else{
        $(".linkedin-error").html(" ");
        $("#linkedin_input").removeClass("border-red");
        $("#linkedin_input").addClass("border-green");
        $.ajax({
            url:"ajax/profile.php?linkedin=true",
            data:$("#add_linkedin_form").serialize(),
            type:"POST",
            dataType:"JSON",
            beforeSend:function(){
               // console.log($("#add_linkedin_form").serialize());
            },
            success:function(feedback){
                console.log(feedback);
                if(feedback["error"]=="success"){
                    location = "index.php";
                }
            }
        });
    }
}

function change_password(old_password,new_password){
    var old_password = old_password.trim();
    var new_password = new_password.trim();
    var password_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
    $("#old_password").removeClass("border-green");
    $("#new_password").removeClass("border-green");
    $("#old_password").removeClass("border-red");
    $("#new_password").removeClass("border-red");
    $(".password-error").html(" ");
    if(old_password.length == '' || old_password.length == 0 ){
        $(".password-error").html("Old Password Cant Be Blank");
        $("#old_password").removeClass("border-green");
        $("#old_password").addClass("border-red");
    }else if(new_password.length == "" || new_password.length == 0){
        $(".password-error").html("New Password Cant Be Blank");
        $("#new_password").removeClass("border-green");
        $("#new_password").addClass("border-red");
    }else if(!password_reg.test(new_password)){
        $(".password-error").html("Password Should Be Mininum 8 Chars, Have One Capital, One Lower and One Number");
       $("#new_password").removeClass("border-green");
       $("#new_password").removeClass("border-green");
        $("#new_password").addClass("border-red");
    }else{
        $("#new_password").addClass("border-green");
        $("#new_password").removeClass("border-red");
        $("#old_password").addClass("border-green");
        $("#old_password").removeClass("border-red");
        $.ajax({
            url:"ajax/profile.php?password=true",
            data:$("#update_password_form").serialize(),
            dataType:"JSON",
            type:"POST",
            beforeSend:function(){
                //console.log($("#update_password_form").serialize());
            },
            success:function(feedback){
                //console.log($("#update_password_form").serialize());
                console.log(feedback);
                if(feedback["error"]=="success"){
                    location="index.php";
                }else if(feedback["error"]=="password_error"){
                    $(".password-error").html(feedback["msg"]);
                    $("#old_password").removeClass("border-green");
                    $("#old_password").addClass("border-red");
                }
            }

        });
    }
    return false;
}

function update_name(name){
    var name = name.trim();
	var name_reg = /^[a-z ]+$/i;
    if(name.length== 0 || name.length == ""){
        $("#name_input").addClass("border-red");
        $("#name_input").removeClass("border-green");
        $(".name-error").html("Name Field Can't Be Blank");
    }else if(!name_reg.test(name)){
		$("#name_input").addClass("border-red");
        $("#name_input").removeClass("border-green");
        $(".name-error").html("Numbers, Special Chars Are Not Allowed");
	}else{
        $.ajax({
            url:"ajax/profile.php?name=true",
            data:$("#update_name_form").serialize(),
            dataType:"JSON",
            type:"POST",
            beforeSend:function(){

            },
            success:function(feedback){
                console.log(feedback);
				if(feedback["error"]=="success"){
					location = "index.php";
				}
            }
        });
    }
}

function add_address(address){
    //alert(address);
    address = address.trim();
    if(address.length == "" || address.length == 0){
        $(".address-error").html("Address Field Can't Be Blank");
        $("#autocomplete").addClass("border-red");
        $("#autocomplete").removeClass("border-green");
    }else{
        $(".address-error").html("");
        $("#autocomplete").removeClass("border-red");
        $("#autocomplete").addClass("border-green");
        /**** ajax address */
        $.ajax({
            url:"ajax/profile.php?address=true",
            data:$("#update_address_form").serialize(),
            type:"POST",
            dataType:"JSON",
            beforeSend:function(){

            },
            success:function(feedback){
                console.log(feedback);
                if(feedback["error"]=="success"){
                    location = "index.php";
                }
            }
        });
        /**** ajax address */
    }
    return false;
}