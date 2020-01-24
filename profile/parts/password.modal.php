<!-- code for modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-lable="close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!-- div.modal-header -->
            <div class="modal-body">
                <form action="" id="update_password_form">
                    <div class="form-group">
                        <div class="password-error error">

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="old_password" class="form-control profile_input" id="old_password" placeholder="Enter Current Password">
                        <!-- input.form-control#old_password -->                       
                    </div>
                    <!-- div.form-group -->
                    <div class="form-group">
                    <input type="password" name="new_password" class="form-control profile_input" id="new_password" placeholder="Enter New Password">
                        <!-- input.form-control#new_password -->
                    </div>
                    <!-- div.form-group -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="return change_password(this.form.old_password.value,this.form.new_password.value)">Save Changes</button>
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