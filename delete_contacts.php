<?php

require_once './config.php';

$cid = intval($_GET['cid']);

$sql = "DELETE FROM `tbl_contacts` WHERE contact_id = :cid";

try {

    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":cid", $cid);

    $stmt->execute();
    $res = $stmt->rowCount();
    if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact deleted successfully.";
    } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete contact.";
    }

} catch (Exception $ex) {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = $ex->getMessage();
}

header("location:index2.php?pagenum=".$_GET['pagenum']);


?>