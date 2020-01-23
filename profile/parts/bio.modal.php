<!-- code for modal -->
<?php 
$query = $db->prepare("SELECT `bio` FROM `users` where id = :id");
$query->bindParam(":id",$_SESSION["id"]);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
//var_dump($result);
// var_dump($result->bio);
if(empty(trim($result->bio))){
    $title = "Add Bio";
}else{
    $title = "Update Bio";
}
?>
<div class="modal fade" id="bio" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?=$title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-lable="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- div.modal-header -->
            <div class="modal-body">
                <form action="" id="bio_form">
                    <div class="form-group">
                        <div class="bio-error error">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control profile_input" id="bio_textarea" name="bio" id="" cols="30" rows="10" placeholder="Add Bio"><?=trim($result->bio);?></textarea>
                        <!-- textarea.form-control#bio_textarea -->
                    </div>
                    <!-- div.form-group -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="return add_bio(this.form.bio_textarea.value);">Save Changes</button>
                        </div>
                        <!-- div.form-group -->
                    </div>
                    <!-- div.modal-footer -->
                </form>
                <!-- form -->
            </div>
            <!-- div.modal-body -->
        </div>
        <!-- div.modal-content -->
    </div>
    <!-- div.modal-dialog -->
</div>
<!-- code for modal -->