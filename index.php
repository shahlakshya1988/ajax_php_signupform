<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Udemy Signup &amp; Login Form</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./assets/css/styles.css" />    
    <script type="text/javascript" src="./assets/js/jquery.min.js" ></script>
</head>
<body>
    <!-- ==== NAVBAR ==== -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light custom-nav">
        <!-- div.container -->
        <div class="container">
            <a href="#" class="navbar navbar-brand">Udemy Signup &amp; Login Form</a>
            <button type="button" class="navbar-toggler" data-target="#mynav" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- div.collapse .navbar-collapse-->
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                </ul>
            </div>
            <!-- div.collapse .navbar-collapse-->
        </div>
        <!-- div.container -->
    </nav>
    <!-- ==== NAVBAR ==== -->
	<!-- div.container -->
    <div class="container">
        <div class="row">
            <!-- ==== div.col-md-7.content ==== -->
            <div class="col-md-7 content">
                <h1>Its Always Free</h1>
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
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="form-heading">Signup</h3>
                                    <!-- h3.form-heading -->
                                    <p>Account Creation is 100% Free, so please create the account</p>
                                    <!-- p -->
                                </div>
                                <!-- div.col-md-9 -->
                                <div class="col-md-3 text-right">
                                    <i class="fa fa-pencil-square-o fa-3x"></i>
                                </div>
                                <!-- div.col-md-3.text-right  -->
                            </div>
                            <!-- div.row -->
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
                    </div>
                    <!-- div.card -->
               </div>
               <!-- div.signup-cover -->
                <!-- signup form -->
                <!-- Login form -->
                <div class="login-cover">
                    <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="form-heading">Login</h3>
                                        <!-- h3.form-heading -->
                                        <p>Enter Login &amp; Password</p>
                                        <!-- p -->
                                    </div>
                                    <!-- div.col-md-9 -->
                                    <div class="col-md-3 text-right">
                                        <i class="fa fa-lock fa-3x"></i>
                                    </div>
                                    <!-- div.col-md-3.text-right  -->
                                </div>
                                <!-- div.row -->
                            </div>
                            <!-- div.card-header -->
                            <div class="card-body">
                                <form>
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                    <!-- div.form-group -->
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                    </div>
                                    <!-- div.form-group -->
                                    
                                    <div class="form-group">
                                        <button type="submit" name="login"  id="login" class="btn btn-success btn-block form-btn">Login</button>
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
    <script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js" ></script>
    <script type="text/javascript" src="./assets/js/simple.js"></script>
    <script type="text/javascript" src="./assets/js/signup.js"></script>
</body>
</html>