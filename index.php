<?php require_once __DIR__.DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."header.php"; ?>
<?php 
    if(isset($_SESSION["id"])){
        header("Location: profile/index.php");
        die();
    }
?>
    <!-- ==== NAVBAR ==== -->
    <?php require_once __DIR__.DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."navigation.php"; ?>
    <?php if(isset($_SESSION["unauthorized"]) && $_SESSION["unauthorized"]){ ?>
    <div class="alert alert-danger text-center all-msg">
        <strong>Please Enter Your Email and Password</strong>
    </div>
    <?php unset($_SESSION["unauthorized"]); } ?>
    <!-- ==== NAVBAR ==== -->
	<!-- div.container -->
    <div class="container">
        <div class="row">
            <!-- ==== div.col-md-7.content ==== -->
            <div class="col-md-7 content">
                <h1>Its Always Free</h1>
                <?php if(isset($_SESSION["online_user"])){ echo "See You Next Time <span class='online_user'> ".$_SESSION["online_user"]." </span>"; } unset($_SESSION["online_user"]); ?>
                <hr>              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas soluta eos harum, dolorum velit perspiciatis aperiam labore odio quaerat adipisci consectetur cumque consequatur optio pariatur nihil culpa ut voluptatum distinctio. Hic repellat iste laboriosam vero dolorum harum nam quas, at mollitia earum necessitatibus itaque, delectus nesciunt ab, architecto obcaecati. Id.</p>
            </div>
            <!-- ==== div.col-md-7.content ==== -->
            <!-- ==== div.col-md-5.content ==== -->
            <div class="col-md-5 content">
                <!-- signup form -->
               <div class="signup-cover">                    
                    <div class="card">
                        <div class="card-header">
                        
                        </div>
                        <!-- div.card-header -->
                        <div class="card-body">
                            <form id="singupSubmit">
                                <div class="form-group show-progress ">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="somename">
                                    <div class="name-error error">

                                    </div>
                                </div>
                                <!-- div.form-group -->
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="example1@example.com">
                                    <div class="email-error error">

                                    </div>
                                </div>
                                <!-- div.form-group -->
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" value="123Hello1988">
                                    <div class="password-error error">
                                        
                                    </div>
                                </div>
                                <!-- div.form-group -->
                                <div class="form-group">
                                    <input type="password" name="confirm" class="form-control" id="confirm" placeholder="Confirm Password"  value="123Hello1988">
                                    <div class="confirm-error error">
                                        
                                    </div>
                                </div>
                                <!-- div.form-group -->
                                <div class="form-group">
                                    <button type="submit" name="submit" value="singup"  id="submit" class="btn btn-success btn-block form-btn">Create Account</button>
                                </div>
                                <!-- div.form-group -->
                                <div class="form-group">
                                    <a href="#" id="login">Already Have An Account?</a>
                                </div>
                            </form>
                            <!-- form -->
                        </div>
                        <!-- div.card-body -->
                        <div class="form-icon">
                            <div class="label-heading">
                                <h5>Create New Account</h5>
                            </div>
                            <!-- div.label-heading -->
                        </div>
                        <!-- div.form-icon -->
                    </div>
                    <!-- div.card -->
               </div>
               <!-- div.signup-cover -->
                <!-- signup form -->
                <!-- Login form -->
                <div class="login-cover">
                    <div class="card">
                            <div class="card-header"></div>
                            <!-- div.card-header -->
                            <div class="card-body">
                                <form id="login-form">
                                    <div class="form-group">
                                        <div class="login-progress-div">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="login-error error">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="login-email" placeholder="Enter Email" value="example1@example.com">
                                        <div class="login-email-error error">
                                        
                                        </div>
                                        <!-- div.login-email-error.error -->
                                    </div>
                                    <!-- div.form-group -->
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="login-password" placeholder="Enter Password" value="123Hello1988">
                                        <div class="login-password-error error">
                                        
                                        </div>
                                        <!-- div.login-password-error.error -->
                                    </div>
                                    <!-- div.form-group -->
                                    
                                    <div class="form-group">
                                        <button type="submit" name="login"  id="login-submit" class="btn btn-success btn-block form-btn">Login</button>
                                    </div>
                                    <!-- div.form-group -->
                                    <div class="form-group">
                                        <a href="#" id="signup">Create New Account</a>
                                    </div>
                                    <!-- div.form-group -->
                                </form>
                                <!-- form -->
                            </div>
                            <!-- div.card-body -->
                            <div class="form-icon">
                                <div class="label-heading">
                                    <h5>User Login</h5>
                                </div>
                                <!-- div.label-heading -->
                            </div>
                            <!-- div.form-icon -->
                        </div>
                        <!-- div.card -->
                </div>
                <!-- div.login-cover -->
                <!-- Login form -->
            </div>
            <!-- ==== div.col-md-5.content ==== -->
        </div>
    </div>
	<!-- div.container -->
<?php require_once __DIR__.DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."footer.php"; ?>