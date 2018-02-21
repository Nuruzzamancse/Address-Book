<?php



try {

    if(isset($_POST['submit_button']))
    {

        if(empty($_POST['first_name']) AND empty($_POST['last_name']) ) {
            $error_massage=("Sorry!.. User ID and Password not Given!! ");
            echo "<script type='text/javascript'>alert('$error_massage');</script>";
        }
        elseif(empty($_POST['first_name'])) {
            $error_massage=("User ID/Email can not be empty");
            echo "<script type='text/javascript'>alert('$error_massage');</script>";
        }
        elseif(empty($_POST['last_name'])) {
            $error_massage=("Password can not be empty");
            echo "<script type='text/javascript'>alert('$error_massage');</script>";
        }
        else
        {
            session_start();
            $first_name = "";
            $last_name = "";

            if(isset($_POST['first_name'])){
                $first_name = $_POST['first_name'];
            }

            if (isset($_POST['last_name'])) {
                $last_name = $_POST['last_name'];
                //$user_userpass = md5($user_userpass);
            }

            include("config.php");

            $query = $DB->prepare("SELECT * FROM tbl_users WHERE user_name=:user_name AND password=:password");

            $query->execute([':user_name' => $first_name, ':password' => $last_name]);



            if($first_name=="" OR $last_name ==""){
                $error_massage=("Sorry!.. Here User Not Found");
                echo "<script type='text/javascript'>alert('$error_massage');</script>";
            }

            if($query->rowCount() == 0){
                $error_massage=("Sorry!.. User Not Found");
                echo "<script type='text/javascript'>alert('$error_massage');</script>";
                header('Location: index.php?err=1');
            }else{
                $row = $query->fetch();

                $_SESSION['user_id'] = $row->user_id;

                //echo $_SESSION['user_id'];

               header('Location: index2.php');


            }
        }


    }
}
catch(Exception $e) {
    $error_message = $e->getMessage();
    echo($error_message);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Address Book</title>
    <meta name="description" content="Love Authority." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="css/style.css" />


    <!-- HOW to Connect an Internal JS -->
    <script language="javascript" type="text/javascript">
        function validation(){

            if(login_form.user_userid.value=="" && login_form.user_userpass.value==""){
                alert("Sorry! User ID and Password not Given!");
                document.getElementById("error_massage").innerHTML = "Sorry! User ID and Password not Given!";
                login_form.user_userid.focus();
                return false;
            }

            if(login_form.user_userid.value==""){
                alert("Sorry! User ID not Given!");
                document.getElementById("error_massage").innerHTML = "Sorry! User ID not Given!";

                login_form.user_userid.focus();
                return false;
            }

            if(login_form.user_userpass.value==""){
                alert("Sorry! User Password not Given!");
                document.getElementById("error_massage").innerHTML = "Sorry! User Password not Given!";

                login_form.user_userpass.focus();
                return false;
            }
        }
    </script>



</head>
<body>
<!--hero section-->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 mx-auto">
                <div class="card border-none">
                    <div class="card-body">
                        <div class="mt-2">
                            <img src="img/male.jpg" alt="Male" class="brand-logo mx-auto d-block img-fluid rounded-circle"/>
                        </div>
                        <p class="mt-4 text-white lead text-center">
                            Sign in to access your Authority account
                        </p>
                        <div class="mt-4">
                            <form name="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                <div class="form-group">

                                    <!-- <input placeholder="User ID" title="Enter User ID" type="text" name="user_userid" class="user_texts" /> -->

                                    <input placeholder="Enter Your User ID" title="Enter User ID" type="text" name="first_name" class="form-control" value="<?php echo (isset($_POST['first_name'])?$_POST['first_name']:''); ?>"/>

                                    <!-- <input type="text" class="form-control" id="email" name="user_userid" value="<?php echo (isset($_POST['user_userid'])?$_POST['user_userid']:''); ?>" placeholder="Enter email address"> -->
                                </div>
                                <div class="form-group">

                                    <input placeholder="Enter Your Password" title="Enter Last Name" type="password" name="last_name" class="form-control" value="<?php echo (isset($_POST['last_name'])?$_POST['last_name']:''); ?>"/>


                                    <!-- <input type="password" class="form-control" id="password" name="user_userpass" value="" placeholder="Enter password"> -->
                                </div>
                                <label class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description text-white">Keep me logged in</span>
                                </label>



                                <button type="submit" name="submit_button" class="btn btn-primary float-right" onclick="return validation();" >Sign in</button>

                            </form>
                            <div class="clearfix"></div>
                            <p class="content-divider center mt-4"><span>or</span></p>
                        </div>
                        <p class="mt-4 social-login text-center">
                            <!-- <a href="#" class="btn btn-twitter"><em class="ion-social-twitter"></em></a>
                            <a href="#" class="btn btn-facebook"><em class="ion-social-facebook"></em></a>
                            <a href="#" class="btn btn-linkedin"><em class="ion-social-linkedin"></em></a>
                            <a href="#" class="btn btn-google"><em class="ion-social-googleplus"></em></a>
                            <a href="#" class="btn btn-github"><em class="ion-social-github"></em></a> -->


                            <?php

                            $error_massage="";
                            echo($error_massage);

                            if(isset($_GET['err'])){
                                $error_massage = $_GET['err'];
                                if($error_massage ==1){
                                    $error_massage=("User Not Found");
                                    // echo  ($error_massage)."</br>";
                                }
                            }
                            ?>

                        <h2 style="color:red;text-align:center;"><?php echo  ($error_massage) ?></h2>

                        </p>
                        <p class="text-center">
                            Don't have an account yet? <a href="register.php">Sign Up Now</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12 mt-5 footer">
                <p class="text-white small text-center">
                    &copy;Md.Nuruzzaman
                </p>
            </div>



            <!--                --><?//php?>


        </div>
    </div>
</section>

</body>
</html>
