<?php
session_start();
$id=$_SESSION['id_user'];
include 'template/head.php';
include 'template/navclient.php';
include 'template/db.php';
?>
<h1 >Мои заявки</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Контактные данные</th>
      <th scope="col">Приём (врач/услуга)</th>
      <th scope="col">Дата и время</th>
      <th scope="col">Оплата</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
<?php
session_start();
$id = $_SESSION['id_user'];

$sql = "SELECT z.contact, v.material, z.datetime, z.oplata, z.status
        FROM zayavka z
        JOIN vid_uslug v ON z.id_vid_uslug = v.id_vid_uslug
        WHERE z.id_user = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['contact']) . '</td>';
    echo '<td>' . htmlspecialchars($row['material']) . '</td>';
    echo '<td>' . htmlspecialchars($row['datetime']) . '</td>';
    echo '<td>' . htmlspecialchars($row['oplata']) . '</td>';
    echo '<td>' . htmlspecialchars($row['status']) . '</td>';
    echo '</tr>';
  }
} else {
  echo '<tr><td colspan="5" class="text-center">У вас пока нет заявок.</td></tr>';
}
$stmt->close();
?>
  </tbody>
</table>