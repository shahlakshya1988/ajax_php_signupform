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