<?php

require_once './config.php';
include './header.php';
try {


    if(isset($_POST['submit_button'])){


        $first_name = trim($_POST['first_name']);



        $middle_name = trim($_POST['middle_name']);
        $last_name = trim($_POST['last_name']);
        $email_id = trim($_POST['email_id']);
        $contact_no1 = trim($_POST['contact_no1']);
        $contact_no2 = trim($_POST['contact_no2']);
        $address = trim($_POST['address']);
        $contact_id = $_POST['submit_button'];




        $filename = "";

        $error = FALSE;

        if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
            $filename = time() . '_' . $_FILES["profile_pic"]["name"];
            $filepath = 'profile_pics/' . $filename;
            if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
                $error = TRUE;
            }
        } else {
            echo 'Fucking Here';
            $filename = $_POST['old_pic'];
        }

        if (!$error) {
            $sql = "UPDATE tbl_contacts SET first_name = :first_name,middle_name =:middle_name,last_name =:last_name,address =:address,contact_no1 =:contact_no1,email_address =:email_address,contact_no2 =:contact_no2  WHERE contact_id = :contact_id ";



            try {
                $stmt = $DB->prepare($sql);



                // execute Query
                $stmt->execute(['first_name'=>$first_name,'contact_id'=>$contact_id,'middle_name'=>$middle_name,'last_name'=>$last_name,'address'=>$address,'contact_no1'=>$contact_no1,'email_address'=>$email_id,'contact_no2'=>$contact_no2]);

                $result = $stmt->rowCount();



                if ($result > 0) {
                    $_SESSION["errorType"] = "success";
                    $_SESSION["errorMsg"] = "Contact updated successfully.";
                } else {
                    $_SESSION["errorType"] = "info";
                    $_SESSION["errorMsg"] = "No changes made to contact.";
                }
            } catch (Exception $ex) {

                $_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = $ex->getMessage();
            }
        } else {
            $_SESSION["errorType"] = "danger";
            $_SESSION["errorMsg"] = "Failed to upload image.";
        }
        header("location:index2.php");
    }




        $cid = intval($_GET["cid"]);


        $sql = 'SELECT * FROM tbl_contacts WHERE contact_id =:contact_id';
        $stmt = $DB->prepare($sql);
        $stmt->execute(['contact_id' => $cid]);
        $contact = $stmt->fetch();





} catch (Exception $ex) {
    echo $ex->getMessage();
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
<form name="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <a class="btn btn-success" type="button" href="index2.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Home</a>
        <!--            <div style="float: right" ><a href="contacts.php"><button class="btn" > Add New Contact</button></a></div>-->




    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Sign Out</a>
            </li>
        </ul>
    </div>


</nav>

<h4 style="text-align: center;color: #9fcdff"><?php echo $contact->first_name." ".$contact->last_name."'s "."Details" ?></h4>



<!--hero section-->
<section class="hero">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 mx-auto">
                <div class="card border-none">
                    <div class="card-body">

                        <div class="mt-4">

                            <form>

                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">First Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $contact->first_name ?>" placeholder="Last Name" id="last_name" class="form-control" name="first_name"><span id="last_name_err" class="error"></span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" style="color: lightgreen" for="profile_pic">Profile picture:</label>

                                        <?php $pic = ($contact->profile_pic <> "" ) ? $contact->profile_pic : "no_avatar.png" ?>
                                        <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>

                                    </div>






                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">Contact No #1:</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $contact->contact_no1 ?>" placeholder="Contact No 1" id="last_name" class="form-control" name="contact_no1"><span id="last_name_err" class="error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">Middle Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $contact->middle_name ?>" placeholder="Last Name" id="last_name" class="form-control" name="middle_name"><span id="last_name_err" class="error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">Last Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $contact->last_name?>" placeholder="Last Name" id="last_name" class="form-control" name="last_name"><span id="last_name_err" class="error"></span>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">Email ID:</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $contact->email_address?>" placeholder="Last Name" id="last_name" class="form-control" name="email_id"><span id="last_name_err" class="error"></span>
                                        </div>
                                    </div>






                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">Contact No #2:</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $contact->contact_no2 ?>" placeholder="Contact No 2" id="last_name" class="form-control" name="contact_no2"><span id="last_name_err" class="error"></span>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label class="control-label col-sm-6" style="color: gold">Address:</label>
                                        <div class="col-sm-10">
                                            <textarea id="address"  name="address" rows="3" class="form-control"><?php echo $contact->address ?></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <div class="clearfix"></div>




                            <div class="form-group">
                                <div class="col-lg-5 col-lg-offset-4">
                                    <button class="btn btn-primary" name="submit_button" value="<?php echo $contact->contact_id;?>" type="submit">Submit</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-11 mt-5 footer">
                <p class="text-white small text-center">
                    &copy; Nuruzzaman
                </p>
            </div>
        </div>
    </div>
</section>
</form>
</body>
</html>
