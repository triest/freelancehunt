
<form >
    <? if (isset($error)&&$error == false) { ?>
        <label><font color="red">Ошибка валидации! Проверьте введенные данные.</font></label>
        <?
    } ?>
    <div class="form-group">
        <label for="title">Имя пользователя:</label>
        <input type="text" class="form-control" id="title" name="title"  value="<?= $task->name ?>" disabled>
    </div>
    <div class="form-group">
        <label for="pwd">email:</label>
        <input type="text" class="form-control" id="email" name="email"  value="<?= $task->email ?>" disabled>
    </div>
    <div class="form-group">
        <label for="pwd">Описание:</label>
        <textarea  type="text" class="form-control" id="text" name="text" disabled><?= $task->text ?></textarea>
        <label>Выполнено</label>  <input type="checkbox" id="status" name="status" <? if ($task->status == 1){ ?>checked <? } ?> disabled>
    </div>
</form>
<? if ($page == 1) { ?>
    <a href="/">Назад</a>
<? } else { ?>
    <a href="/?page=<?= $page ?>">Назад</a>
<? } ?>



