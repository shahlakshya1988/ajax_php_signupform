<!-- code for modal -->
<?php 
/*** name code goes here*/
$get_name = $db->prepare("SELECT `name` FROM `users` where `id` = :id LIMIT 1");
$get_name->bindParam(":id",$_SESSION["id"]);
$get_name->execute();
$res_name = $get_name->fetch(PDO::FETCH_OBJ);
$name_db = trim($res_name->name);
if(!empty($name_db)){
    $title="Update Name";
}else{
    $title="Add Name";
}
/*** name code goes here*/
?>
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?=$title;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-lable="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- div.modal-header -->
            <div class="modal-body">
                <form action="" id="update_name_form">
                    <div class="form-group">
                        <div class="name-error error">

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name_input" id="name_input" class="form-control profile_input" placeholder="Enter Name..." value="<?=$name_db;?>">
                        <!-- input.form-control#name_input -->
                    </div>
                    <!-- div.form-group -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="return update_name(this.form.name_input.value)">Save Changes</button>
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