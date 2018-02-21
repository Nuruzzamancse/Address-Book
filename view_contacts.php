<?php

require_once './config.php';

include './header.php';

try {
//    $sql = "SELECT * FROM tbl_contacts WHERE 1 AND contact_id = :cid";
//    $stmt = $DB->prepare($sql);
//    $stmt->bindValue(":cid", intval($_GET["cid"]));
//
//    $stmt->execute();
//    $results = $stmt->fetchAll();


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

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <form class="form-horizontal" action="index2.php" method="get">
        <button class="btn btn-success" type="submit" href="index2.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Home</button>
        <!--            <div style="float: right" ><a href="contacts.php"><button class="btn" > Add New Contact</button></a></div>-->

    </form>








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
                                            <input type="text"  value="<?php echo $contact->first_name ?>" placeholder="Last Name" id="last_name" class="form-control" name="last_name"><span id="last_name_err" class="error"></span>
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
                                            <input type="text"  value="<?php echo $contact->email_address?>" placeholder="Last Name" id="last_name" class="form-control" name="email_address"><span id="last_name_err" class="error"></span>
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

</body>
</html>
