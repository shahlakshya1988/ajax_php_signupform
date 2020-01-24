<!-- code for modal -->
<?php 
$query = $db->prepare("SELECT `linkedin` FROM `users` where `id` = :id");
$query->execute(array("id"=>$_SESSION["id"]));
$result = $query->fetch(PDO::FETCH_OBJ);
// var_dump($result);
if(empty(trim($result->linkedin))){
    $title = "Add Linkedin";
}else{
    $title = "Update Linkedin";
}
$linkedin_db = $result->linkedin;
?>
<div class="modal fade" id="linkedinModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?=$title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-lable="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- div.modal-header -->
            <div class="modal-body">
                <form action="" id="add_linkedin_form">
                    <div class="form-group">
                        <div class="linkedin-error error">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="linkedin_input" id="linkedin_input" class="form-control profile_input" placeholder="Enter Linkedin Account..." value="<?=trim($linkedin_db)?>">
                        <!-- input.form-control#linkedin_input -->
                    </div>
                    <!-- div.form-group -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="return add_linkedin(this.form.linkedin_input.value);">Save Changes</button>
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