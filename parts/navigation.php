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
                    <?php  
                    if(isset($_SESSION["id"]) && !empty(trim($_SESSION["id"]))){ ?>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link btn-success logout-btn">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- div.collapse .navbar-collapse-->
        </div>
        <!-- div.container -->
    </nav>