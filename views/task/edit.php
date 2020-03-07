
<form method="post"  class="form-horizontal">
    <? if (isset($error)&&$error == false) { ?>
        <label><font color="red">Ошибка валидации! Проверьте введенные данные.</font></label>
        <?
    } ?>
    <div class="form-group">
        <label for="title">Имя пользователя:</label>
        <input type="text" class="form-control" id="title" name="title"  value="<?= $task->name ?>" required>
    </div>
    <div class="form-group">
        <label for="pwd">email:</label>
        <input type="text" class="form-control" id="email" name="email"  value="<?= $task->email ?>" required>
    </div>
    <div class="form-group">
        <label for="pwd">Описание:</label>
        <textarea  type="text" class="form-control" id="text" name="text" required><?= $task->text ?></textarea>
       <label>Выполнено</label>  <input type="checkbox" id="status" name="status" <? if ($task->status == 1){ ?>checked <? } ?> >
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
<? if ($page == 1) { ?>
    <a href="/">Назад</a>
<? } else { ?>
    <a href="/?page=<?= $page ?>">Назад</a>
<? } ?>




