<input type="button" class="btn btn-primary" onclick="window.location.href = '/task/create';" value="Создать задачу"/>
<div class="container">
    <table class="table">
        <thead>
        <th>
            <a href="/?order=name<? if ($sort == "name" && $order == "desc") { ?>&sort=asc<? } elseif ($sort == "name" && $order == "acs") { ?>&sort=desc<? } ?>">
                Проект</a></th>
        <th>
            <a href="/?order=email<? if ($sort == "email" && $order == "desc") { ?>&sort=asc<? } ?>"">Бюджет</a>
        </th>
        <th>
            <a href="/?order=status<? if ($sort == "status" && $order == "desc") { ?>&sort=asc<? } ?>"">Заказчик</a>
        </th>
        </thead>
        <tbody>
        <? foreach ($projects as $item) { ?>
            <tr>
                <td>
                    <?= $item->name ?>
                </td>
                <td>
                    <?= $item->budget ?>
                </td>
                <td>
                    <?= $item->customir_login ?>
                </td>
            </tr>
            <?
        } ?>
        </tbody>
    </table>


    <div>
        <b>Количество открытых проектов</b>
        <? $skills = Model_Skill::getAll() ?>
        <table class="table">
            <tbody>
            <? foreach ($skills as $item) { ?>
                <tr>
                    <td>
                        <?= $item->name ?>
                    </td>
                    <td>
                        <?= $item->getCountProject() ?>
                    </td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>


</div>
</div>