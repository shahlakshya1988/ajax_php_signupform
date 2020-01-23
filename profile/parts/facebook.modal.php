<!-- code for modal -->
<?php 
$query = $db->prepare("SELECT `facebook` FROM `users` where `id` = :id");
$query->execute(array("id"=>$_SESSION["id"]));
$result = $query->fetch(PDO::FETCH_OBJ);
// var_dump($result);
if(empty(trim($result->facebook))){
    $title = "Add Facebook";
}else{
    $title = "Update Facebook";
}
$facebook_db = $result->facebook;
?>
<div class="modal fade" id="facebookModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?=$title;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-lable="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- div.modal-header -->
            <div class="modal-body">
                <form action="" id="update_facebook_form">
                    <div class="form-group">
                        <div class="facebook-error error">

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="facebook_input" id="facebook_input" class="form-control profile_input" placeholder="Enter Facebook Account..." value="<?=trim($facebook_db); ?>">
                        <!-- input.form-control#facebook_input -->
                    </div>
                    <!-- div.form-group -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="return add_facebook(this.form.facebook_input.value)">Save Changes</button>
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