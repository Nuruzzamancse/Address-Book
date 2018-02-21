<?php
require_once './config.php';
include './header.php';

 try{


     $keyword="";

     if(isset($_GET["keyword"])) {
         $keyword = trim($_GET["keyword"]);
     }



        session_start();
        $user_id = $_SESSION['user_id'];

         if ($keyword <> "") {
             $sql = "SELECT * FROM tbl_contacts WHERE user_id = '$user_id' AND "
                 . " (address LIKE :keyword) ORDER BY first_name ";

             $stmt = $DB->prepare($sql);

             $stmt->bindValue(":keyword", $keyword . "%");

             $stmt->execute();
         }

     else{



         $sql = "SELECT * FROM tbl_contacts WHERE user_id =:user_id ORDER BY first_name";
         $stmt = $DB->prepare($sql);
         $stmt->execute(['user_id' => $_SESSION['user_id']]);

     }




     $results = $stmt->fetchAll();



 }
 catch (Exception $ex) {
     echo $ex->getMessage();
 }
?>

<div class="form-control">



    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <form class="form-inline" action="index2.php" method="get">
            <input class="form-control" name="keyword"  type="text" placeholder="Search by first name">
            <button class="btn btn-success" name="search_button" type="submit">Search</button>
<!--            <div style="float: right" ><a href="contacts.php"><button class="btn" > Add New Contact</button></a></div>-->
        </form>

        <div class="btn-group col-md-8 text-right" role="group" style="justify-content: flex-end;">
            <a class="btn btn-secondary btn-md" href="contacts.php">
                <i class="fa fa-plus" aria-hidden="true"></i><button class="btn" > Add New Contact</button></a>

        </div>



        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Sign Out</a>
                </li>
            </ul>
        </div>


    </nav>

<!--    <form action="index2.php" method="get">-->
<!--        <input type="text" value="--><?php //echo $_GET["keyword"]; ?><!--" placeholder="search by first name" id=""  name="keyword" style="height: 41px;">-->
<!---->
<!--        <button class="btn btn-info">search</button>-->
<!--    </form>-->

<!--    <div class="pull-right" ><a href="contacts.php"><button > Add New Contact</button></a></div>-->

    <div class="clearfix"></div>

    <?php if (count($results) >0 ) { ?>
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th >Avatar</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact No #1</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
            <?php foreach ($results as $result){?>
                <tr>
                    <td>
                        <?php $pic = ($result->profile_pic <> "" ) ? $result->profile_pic : "no_avatar.png" ?>
<!--                        --><?php //$pic = ($res["profile_pic"] <> "")? $res["profile_pic"] : "no_avater.png"?>
                        <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a>

                    </td>


                    <td> <?php echo $result->first_name?></td>
                    <td> <?php echo $result->last_name?></td>
                    <td> <?php echo $result->contact_no1?></td>
                    <td> <?php echo $result->email_address?></td>

                    <td>

                        </a>
                        <a class="btn btn-success a-btn-slide-text" href="view_contacts.php?cid=<?php echo $result->contact_id?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>View</strong></span></a>
                        <a class="btn btn-info a-btn-slide-text" href="contacts2.php?m=update&cid=<?php echo $result->contact_id; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span></a>&nbsp;
                        <a class="btn btn-danger a-btn-slide-text" href="delete_contacts.php?cid=<?php echo $result->contact_id; ?>" onclick="return confirm('Are you sure?')"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span><strong>Delete</strong></span></a>&nbsp;


                    </td>



                </tr>

                <?php } ?>

                </tbody>
            </table>


<?php } ?>


    <a class="btn btn-success a-btn-slide-text" href="download.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        <span><strong>Download</strong></span></a>

</div>

<?php include './footer.php'?>