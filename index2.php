<?php
require_once './config.php';
include './header.php';

 try{


     $keyword = trim($_GET["keyword"]);

     $keyword = trim($_GET["keyword"]);

     if($keyword<>""){
         $sql = "SELECT * FROM tbl_contacts WHERE 1 AND "
             . " (first_name LIKE :keyword) ORDER BY first_name ";

         $stmt = $DB->prepare($sql);

         $stmt->bindValue(":keyword", $keyword."%");
     }else{
         $sql = "SELECT * FROM tbl_contacts WHERE 1 ORDER BY first_name";
         $stmt = $DB->prepare($sql);

     }

     $stmt->execute();

     $results = $stmt->fetchAll();


 }
 catch (Exception $ex) {
     echo $ex->getMessage();
 }
?>

<div class="form-control">



    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <form class="form-inline" action="index2.php" method="get">
            <input class="form-control" name="keyword" value="<?php echo $_GET["keyword"]?>" type="text" placeholder="Search by first name">
            <button class="btn btn-success" type="submit">Search</button>
<!--            <div style="float: right" ><a href="contacts.php"><button class="btn" > Add New Contact</button></a></div>-->
        </form>

        <div class="btn-group col-md-8 text-right" role="group" style="justify-content: flex-end;">
            <a class="btn btn-secondary btn-md" href="contacts.php">
                <i class="fa fa-plus" aria-hidden="true"></i><button class="btn" > Add New Contact</button></a>

        </div>



        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Sign Out</a>
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
            <?php foreach ($results as $res){?>
                <tr>
                    <td>
                        <?php $pic = ($res["profile_pic"] <> "" ) ? $res["profile_pic"] : "no_avatar.png" ?>
<!--                        --><?php //$pic = ($res["profile_pic"] <> "")? $res["profile_pic"] : "no_avater.png"?>
                        <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a>

                    </td>


                    <td> <?php echo $res["first_name"]?></td>
                    <td> <?php echo $res["last_name"]?></td>
                    <td> <?php echo $res["contact_no1"]?></td>
                    <td> <?php echo $res["email_address"]?></td>

                    <td>

                        </a>
                        <a class="btn btn-light a-btn-slide-text" href="view_contacts.php?cid=<?php echo $res["contact_id"]?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>View</strong></span></a>
                        <a class="btn btn-info a-btn-slide-text" href="contacts.php?m=update&cid=<?php echo $res["contact_id"]; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span></a>&nbsp;
                        <a class="btn btn-danger a-btn-slide-text" href="process_form.php?mode=delete&cid=<?php echo $res["contact_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span><span><strong>Delete</strong></span></a>&nbsp;


                    </td>



                </tr>

                <?php } ?>

                </tbody>
            </table>


<?php } ?>

</div>

<?php include './footer.php'?>