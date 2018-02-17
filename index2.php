<?php
require_once './config.php';
include './header.php';

 try{


     $keyword = trim($_GET["keyword"]);

     $keyword = trim($_GET["keyword"]);

     if($keyword<>""){
         $sql = "SELECT * FROM tbl_contacts WHERE 1 AND "
             . " (first_name LIKE :keyword) ORDER BY first_name ";

         $stmt = $db->prepare($sql);

         $stmt->bindValue(":keyword", $keyword."%");
     }else{
         $sql = "SELECT * FROM tbl_contacts WHERE 1 ORDER BY first_name";
         $stmt = $db->prepare($sql);

     }

     $stmt->execute();

     $results = $stmt->fetchAll();


 }
 catch (Exception $ex) {
     echo $ex->getMessage();
 }
?>

<div class="row">


    <form action="index2.php" method="get">
        <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="search by first name" id=""  name="keyword" style="height: 41px;">

        <button class="btn btn-info">search</button>
    </form>

    <div class="pull-right" ><a href="contacts.php?m=''&cid=''"><button > Add New Contact</button></a></div>

    <div class="clearfix"></div>

    <?php if (count($results) >0 ) { ?>
            <table>
                <tbody>
                    <tr>
                        <th>Avatar</th>
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
                        <a href="view_contacts.php?cid=<?php echo $res["contact_id"]?>"><button>view</button></a>
                        <a href="contacts.php?m=update&cid=<?php echo $res["contact_id"]; ?>"><button > Edit</button></a>&nbsp;
                        <a href="process_form.php?mode=delete&cid=<?php echo $res["contact_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"><button></span> Delete</button></a>&nbsp;


                    </td>



                </tr>

                <?php } ?>

                </tbody>
            </table>


<?php } ?>

</div>

<?php include './footer.php'?>