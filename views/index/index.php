<input type="button" class="btn btn-primary" onclick="window.location.href = '/task/create';" value="Создать задачу"/>
<div class="container">
    <table class="table">
        <thead>
        <th>
            <a href="/?order=name<? if ($sort == "name" && $order == "desc") { ?>&sort=asc<? } elseif ($sort == "name" && $order == "acs") { ?>&sort=desc<? } ?>">
                Название</a></th>
        <th><a href="/?order=email<? if ($sort == "email" && $order == "desc") { ?>&sort=asc<? } ?>"">email</a></th>
        <th><a href="/?order=status<? if ($sort == "status" && $order == "desc") { ?>&sort=asc<? } ?>"">выполненно</a>
        </th>
        <th><a href="/?order=edit<? if ($sort == "edit" && $order == "desc") { ?>&sort=asc<? } ?>"">отредактировано
            администратором</a></th>
        </thead>
        <tbody>
        <? foreach ($tasks as $item) {
            ?>
            <tr>
                <td><a href="/task/view?id=<?= $item->id ?>"><?= $item->name ?></a></td>
                <td><?= $item->email ?></td>
                <td>
                      <? if ($item->status == 1) {
                        echo "да";
                    } else {
                        echo "нет";
                    } ?>
                </td>
                <td>
                    <? if ($item->edit == 1) {
                        echo "да";
                    } else {
                        echo "нет";
                    } ?>
                </td>
                <? if ($_SESSION['auth_user'] == "admin") { ?>
                    <td><a href="/task/edit?id=<?= $item->id ?>">Редактировать</a></td>
                <? } ?>
            </tr>
            <?
        } ?>
        </tbody>
    </table>
    <? if ($num_pages > 1) {
        for ($i = 1; $i <= $num_pages; $i++) {
            if ($i != $page) {
                ?>
                <a href="/?page=<?= $i ?><? if (isset($sort)) { ?>&order=<?= $sort ?> <? } ?> <? if (isset($order)) { ?> &sort=<?= $order ?> <? } ?> ">

                    <?= $i ?></a>
                <?
            } else {
                ?>
                <?= $i ?>
                <?
            }
        }
    } ?>

</div>