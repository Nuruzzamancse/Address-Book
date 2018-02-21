<?php

    include_once './config.php';

    include './header.php';



    if(isset($_POST['submit_button'])){

        $first_name = trim($_POST['first_name']);
        $middle_name = trim($_POST['middle_name']);
        $last_name = trim($_POST['last_name']);
        $email_id = trim($_POST['email_id']);
        $contact_no1 = trim($_POST['contact_no1']);
        $contact_no2 = trim($_POST['contact_no2']);
        $address = trim($_POST['address']);
        $filename = "";
        $error = FALSE;

        if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
            $filename = time() . '_' . $_FILES["profile_pic"]["name"];
            $filepath = 'profile_pics/' . $filename;
            if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
                $error = TRUE;
            }
        }

        if (!$error) {


            session_start();

            try {

                $sql = 'INSERT INTO tbl_contacts(user_id,first_name,middle_name,last_name,address,contact_no1,contact_no2,email_address,profile_pic) VALUES(:user_id,:first_name,:middle_name,:last_name,:address,:contact_no1,:contact_no2,:email_address,:profile_pic)';


                $user_id = $_SESSION['user_id'];

                echo $user_id.'Kisu na';

                $stmt = $DB->prepare($sql);

                $stmt->execute(['user_id'=>$user_id,'first_name'=>$first_name,'middle_name'=>$middle_name,'last_name'=>$last_name,'email_address'=>$email_id,'address'=>$address,'contact_no1'=>$contact_no1,'contact_no2'=>$contact_no2,'profile_pic'=>$filename]);

                echo 'Here';


                $result = $stmt->rowCount();
                if ($result > 0) {
                    $_SESSION["errorType"] = "success";
                    $_SESSION["errorMsg"] = "Contact added successfully.";
                } else {
                    $_SESSION["errorType"] = "danger";
                    $_SESSION["errorMsg"] = "Failed to add contact.";
                }
            } catch (Exception $ex) {

                $_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = $ex->getMessage();
            }
        } else {
            $_SESSION["errorType"] = "danger";
            $_SESSION["errorMsg"] = "failed to upload image.";
        }
  header("location:index2.php");
    }




?>

    <li><a href="index2.php">Home</a></li>




    <form name="login_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">


            <fieldset>


                <div class="form-group">
                    <label class="col-lg-4 control-label" for="first_name"><span class="required">*</span>First Name:</label>
                    <div class="col-lg-5">
                        <input type="text" placeholder="First Name" id="first_name" class="form-control" name="first_name"><span id="first_name_err" class="error"></span>
                    </div>
                </div>




                <div class="form-group">
                        <label class="col-lg-4 control-label" for="middle_name">Middle Name:</label>
                        <div class="col-lg-5">
                            <input type="text"  placeholder="Middle Name" id="middle_name" class="form-control" name="middle_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="last_name"><span class="required">*</span>Last Name:</label>
                        <div class="col-lg-5">
                            <input type="text"  placeholder="Last Name" id="last_name" class="form-control" name="last_name"><span id="last_name_err" class="error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="email_id"><span class="required">*</span>Email ID:</label>
                        <div class="col-lg-5">
                            <input type="text" placeholder="Email ID" id="email_id" class="form-control" name="email_id"><span id="email_id_err" class="error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="contact_no1"><span class="required">*</span>Contact No #1:</label>
                        <div class="col-lg-5">
                            <input type="text"  placeholder="Contact Number" id="contact_no1" class="form-control" name="contact_no1"><span id="contact_no1_err" class="error"></span>
                            <span class="help-block">Maximum of 10 digits only and only numbers.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="contact_no2">Contact No #2:</label>
                        <div class="col-lg-5">
                            <input type="text"  placeholder="Contact Number" id="contact_no2" class="form-control" name="contact_no2"><span id="contact_no2_err" class="error"></span>
                            <span class="help-block">Maximum of 10 digits only and only numbers.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label" for="profile_pic">Profile picture:</label>
                        <div class="col-lg-5">
                            <input type="file"  id="profile_pic" class="form-control file" name="profile_pic"><span id="profile_pic_err" class="error"></span>
                            <span class="help-block">Must me jpg, jpeg, png, gif, bmp image only.</span>
                        </div>
                    </div>


<!--                --><?php //if($_GET['m'] == 'update') { ?>
<!---->
<!--                    <div class="form-group">-->
<!--                        <div class="col-lg-1 col-lg-offset-4">-->
<!--                        --><?php //$pic = ($results[0]["profile_pic"] <> "" ) ? $results[0]["profile_pic"] : "no_avatar.png" ?>
<!--                        <a href="profile_pics/--><?php //echo $pic ?><!--" target="_blank"><img src="profile_pics/--><?php //echo $pic ?><!--"  ></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                --><?php //} ?>



                <div class="form-group">
                    <label class="col-lg-4 control-label" for="address">Address:</label>
                    <div class="col-lg-5">
                        <textarea id="address" name="address" rows="3" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-5 col-lg-offset-4">
                        <button class="btn btn-primary" name="submit_button" type="submit">Submit</button>
                    </div>
                </div>





                </div>
            </fieldset>

        </form>




<?php include './footer.php'?>
