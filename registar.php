<?php
include 'template/head.php';
include 'template/nav.php';

?>
<?php
include 'template/db.php';

$fio = $_POST['fio'];
$tel = $_POST['tel'];
$addres = $_POST['addres'];
$email = $_POST['email'];
$login = $_POST['login'];
$pass = $_POST['password'];


$sql = "INSERT INTO `user` (`login`, `password`, `addres`, `email`, `tel`, `role`, `fio`)
        VALUES (?, ?, ?, ?, ?, 'Клиент', ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssssss", $login, $pass, $addres, $email, $tel, $fio);
$stmt->execute();
$stmt->close();

header('Location: formavto.php');
?>