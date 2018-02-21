<?php
// PDO connect *********
function connect() {
    $host = 'localhost';
    $db_name = 'address_book';
    $db_user = 'root';
    $db_password = '';
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

?>

<?php
// including the config file
include('config.php');


$pdo = connect();

// set headers to force download on csv format
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=members.csv');

// we initialize the output with the headers
$output = "First Name,Middle Name,Last Name,Contact No #1,Contact No #2, Email Address\n";
// select all members

session_start();

$user_id = $_SESSION['user_id'];

$sql = 'SELECT * FROM tbl_contacts WHERE user_id =:user_id ORDER BY first_name ASC';


//$sql = 'SELECT * FROM posts WHERE id =:id';
//$stmt = $pdo->prepare($sql);
//$stmt->execute(['id' => $id]);
//$post = $stmt->fetch();



$query = $pdo->prepare($sql);

$query->execute(['user_id'=>$user_id]);

$list = $query->fetchAll();

foreach ($list as $rs) {
    // add new row
    $output .= $rs['first_name'].",".$rs['middle_name'].",".$rs['last_name'].",".$rs['contact_no1'].",".$rs['contact_no2'].",".$rs['email_address']."\n";
}
// export the output
echo $output;
exit;
?>
