<?php
include 'template/head.php';
include 'template/navadmin.php';
include 'template/db.php';
?>
<h1> Панель администратора</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ФИО Клиента</th>
      <th scope="col">Контактные данные</th>
      <th scope="col">Приём (врач/услуга)</th>
      <th scope="col">Дата и Время</th>
      <th scope="col">Оплата</th>
      <th scope="col">Статус</th>
      <th scope="col">Иные свойства заявки</th>
    </tr>
  </thead>
  <tbody>
<?php
session_start();
$sql = "SELECT z.id_zayavka, u.fio, z.contact, v.material, z.datetime, z.oplata, z.status
        FROM zayavka z
        JOIN user u ON z.id_user = u.id_user
        JOIN vid_uslug v ON z.id_vid_uslug = v.id_vid_uslug";
$res = $mysqli->query($sql);

foreach ($res as $row) {
  echo '<tr>';
  echo '<td>' . htmlspecialchars($row['fio']) . '</td>';
  echo '<td>' . htmlspecialchars($row['contact']) . '</td>';
  echo '<td>' . htmlspecialchars($row['material']) . '</td>';
  echo '<td>' . htmlspecialchars($row['datetime']) . '</td>';
  echo '<td>' . htmlspecialchars($row['oplata']) . '</td>';
  echo '<td>' . htmlspecialchars($row['status']) . '</td>';
  echo '<td>';
  if ($row['status'] == 'Новая заявка') {
    echo '<a href="update status.php?id_zayavka=' . $row['id_zayavka'] . '" class="btn btn-success btn-sm">Выполнена</a> ';
    echo '<a href="update_status_prichina.php?id_zayavka=' . $row['id_zayavka'] . '" class="btn btn-danger btn-sm">Отменить</a>';
  }
  echo '</td>';
  echo '</tr>';
}
?>
  </tbody>
</table>