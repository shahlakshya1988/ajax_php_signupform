<?php require_once __DIR__.DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."header.php"; ?>
<!-- ==== NAVBAR ==== -->
<?php require_once __DIR__.DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."navigation.php"; ?>
<!-- ==== NAVBAR ==== -->
<div class="container main">
    <div class="row">
        <div class="col-lg-12">
            <div class="success-area">
                <?php //var_dump($_SESSION); ?>
                <?php if(isset($_SESSION["user_name"]) && !empty($_SESSION["user_name"]) && isset($_SESSION["id"]) && !empty($_SESSION["id"]) ){ ?>
                    <div class="">
                      <i class="fa fa-check-circle"></i>  Hello, <strong><?=$_SESSION["user_name"]?></strong>, Welcome to our site<br>
                       <a href="index.php">Login Here</a>
                    </div>
                <?php } unset($_SESSION); ?>
            </div>
            <!-- div.success-area -->
        </div>
        <!-- div.col-lg-12 -->
    </div>
    <!-- div.row -->
</div>
<!-- div.container.main -->
<?php require_once __DIR__.DIRECTORY_SEPARATOR."parts".DIRECTORY_SEPARATOR."footer.php"; ?>