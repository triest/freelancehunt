<?php
    /**
     * Created by PhpStorm.
     * User: triest
     * Date: 29.02.2020
     * Time: 13:08
     */
?>

<form action="/login" method="post" class="form-horizontal">
    <? if (isset($error) && $error == true) {
        echo "Ошибка валидации или неверные логин или пароль!";
        echo "<br>";
    } ?>
    <div class="form-group">
        <label for="email">Логин:</label>
        <input type="text" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="text" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>

    <a href="/">Назад</a>
</form>