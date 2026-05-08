<?php
include 'template/db.php';


if(!empty($_POST)) {
$id_user=$_POST['id_user'];
$status=$_POST['status'];


$sql="UPDATE zayvka  SET  status ='$status' WHERE id_user =$id_user";

$res=$mysql->query($sql);
header("Llocation:prosmotr.php");
exit();
}
?>



