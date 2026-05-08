<?php
include 'template/head.php';
include 'template/nav.php';
?>

<form method="post" action="registar.php">
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
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email"
               placeholder="example@mail.ru"
               required>
        <div class="form-text">Укажите действующий адрес электронной почты.</div>
    </div>

    <div class="mb-3">
        <label for="login" class="form-label">Логин</label>
        <input type="text" class="form-control" id="login" name="login"
               pattern="[A-Za-z0-9]{6,}"
               title="Латиница и цифры, не менее 6 символов"
               required>
    </div>

    <div class="mb-3">
        <label for="pass" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="pass" name="password"
               minlength="8"
               required>
    </div>

    <div class="mb-3">
        <label for="tel" class="form-label">Телефон</label>
        <input type="tel" class="form-control" id="tel" name="tel"
               placeholder="8(XXX)XXX-XX-XX"
               required>
    </div>

    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>