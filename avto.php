<?php include 'template/head.php'?>
<?php include 'template/nav.php'?>

<?php 

session_start();

include 'template/db.php';


$userlogin = $_POST['login']; 
$userpassword = $_POST['password']; 


$sql = ("SELECT * FROM user WHERE login='$userlogin' AND password='$userpassword'");
$res = $mysqli->query($sql); 
$user = mysqli_fetch_assoc($res);
$id = $user['id_user']; 
$role = $user['role']; 
$fio = $user['fio'];

if (!empty($user)) { 

    $_SESSION['id_user'] = $id;
    $_SESSION['role'] = $role;
    $_SESSION['fio'] = $fio;
}
header('Location: index.php');
?>