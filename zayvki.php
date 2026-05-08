<?php
session_start();
include 'template/db.php';
include 'template/head.php';
include 'template/navclient.php';
?>
<h1> Новая Заявка </h1>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">№ п/п</th>
     <th scope="col">id заявка</th>
      <th scope="col">id пользователь</th>
        <th scope="col">id услуги</th>
             <th scope="col">Адрес</th>
        <th scope="col">Контактные данные </th>
         <th scope="col">Дата </th>
           <th scope="col">Тип оплаты</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
$id_user=$_SESSION['id_user'];
$sql="SELECT zayvka. id_zayvka,id_user, id_vid_uslug, address, contact,data, oplata,status  FROM zayvka,user WHERE zayvka.id_user=users.id_user and zayvka.id_user='$id_user' ";
$res=$mysql->query($sql);
foreach($res as $row);{ 
   echo'<tr>
  <th scope="row>'.$row['id_user'].'</th>
   td>'.$row['id_zayvka'].'</td>
   <td>'.$row['id_vid_uslug'].'</td>
   <td>'.$row['address'].'</td>
   <td>'.$row['contact'].'</td>
    <td>'.$row['data'].'</td>
    <td>'.$row['oplata'].'</td>
	  <td>'.$row['status'].'</td>'
   </tr>"
  }
?>