<?php

include_once './config.php';
include './header.php';


if(isset($_POST['submit_button'])) {


    $fullname = $_POST['full_name'];

    $user_name = $_POST['user_name'];

    $password = $_POST['password'];

    $confirm_password = $_POST['confirm_password'];


    $email = $_POST['email'];

    $sql = 'INSERT INTO tbl_users(full_name,user_name,password,confirm_password,email) VALUES(:full_name,:user_name,:password,:confirm_password,:email)';

    $stmt = $DB->prepare($sql);

    $stmt->execute(['full_name' => $fullname, 'user_name' => $user_name, 'password' => $password, 'confirm_password' => $confirm_password, 'email' => $email]);


    header("location:index.php");


}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Address Book</title>
        <meta name="description" content="Love Authority." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
<!--        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />-->
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
    <form name="register_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

    <!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                                <div class="mt-2 text-center">
                                    <h2>Create Your Account</h2>
                                </div>
                                <p class="mt-4 text-white lead text-center">
                                    Sign up to get started with Authority
                                </p>
                                <div class="mt-4">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="full_name" value="" placeholder="Enter Your Full Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="user_name" value="" placeholder="Enter Your User Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="" placeholder="Enter email address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" value="" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="confirm_password" value="" placeholder="Confirm password">
                                        </div>

                                        <button type="submit" name="submit_button" class="btn btn-primary btn-block">Create Account</button>

                                    <div class="clearfix"></div>
                                    <p class="content-divider center mt-4"><span>or</span></p>
                                </div>

                                <p class="text-center">
                                    Already have an account? <a href="index.php">Login Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mt-5 footer">
                        <p class="text-white small text-center">
                            &copy; Md.Nuruzzaman

                        </p>
                    </div>
                </div>
            </div>
        </section>

    </form>

    </body>
</html>
