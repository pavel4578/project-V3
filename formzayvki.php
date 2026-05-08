<?php
include 'template/db.php';
include 'template/head.php';
include 'template/navclient.php';
?>
<h1>Новая Заявка </h1>
<form method="post" action="">

<div class="mb-3">
        <label for="fio" class="form-label">ФИО</label>
        <input type="text" class="form-control" id="fio" name="fio"
               pattern="^[А-Яа-яЁё\s]+$"
               placeholder="Иванов Иван Иванович"
               required>
        <div class="form-text">Укажите фамилию, имя и отчество (кириллицей).</div>
    </div>

 <div class="mb-3">
        <label for="addres" class="form-label">Адрес места жительства</label>
        <input type="text" class="form-control" id="addres" name="addres" required>
    </div>


    <div class="mb-3">
        <label for="contact" class="form-label">Контактные данные</label>
        <input type="text" class="form-control" id="contact" name="contact"  placeholder="8(XXX)XXX-XX-XX"
               required>
    </div>

       <label for="datetimed" class="form-label">Желаемая дата и время получения услуги</label>
    <input type="datetime-local" id="datetimed" name="data" 
           value="<?php echo date('Y-m-d\TH:i'); ?>"> 
 
    <div class="mb-3">
        <label for="id_vid_uslug" class="form-label">Приём (врач/услуга)</label>
        <select class="form-select" name="id_vid_uslug" required>
            <option selected disabled>Выберите услугу</option>
            <?php
            $sql = "SELECT * FROM `vid_uslug`";
            $res = $mysqli->query($sql);
            foreach ($res as $row) {
                echo '<option value="' . $row['id_vid_uslug'] . '">' . $row['material'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="oplata" class="form-label">Способ оплаты</label>
        <select class="form-select" name="oplata" required>
            <option selected disabled>Выберите способ оплаты</option>
            <option value="наличные">Наличные</option>
            <option value="банковская карта">Банковская карта</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = $_POST['contact'];
    $id_vid_uslug = $_POST['id_vid_uslug'];
    $datetime = $_POST['datetime'];
    $oplata = $_POST['oplata'];
    $id = $_SESSION['id_user'];

    // Используйте подготовленные выражения для безопасности
    $stmt = $mysqli->prepare("INSERT INTO `zayavka` (`id_user`, `id_vid_uslug`, `contact`, `datetime`, `oplata`, `status`)
                              VALUES (?, ?, ?, ?, ?, 'Новая заявка')");
    $stmt->bind_param("iisss", $id, $id_vid_uslug, $contact, $datetime, $oplata);
    $stmt->execute();
    $stmt->close();

    echo '<div class="alert alert-success mt-3">Заявка успешно отправлена!</div>';
}
?>

