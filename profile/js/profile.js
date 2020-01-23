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