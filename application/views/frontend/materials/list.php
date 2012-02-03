<div class="clr"></div>
<div class="title"><h1>Материалы</h1></div>
<div class="add">
    <a href="/materials/create/"> <input type="submit" value="  " /> </a></div>
<div class="clr"></div>
<div class="table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="table_title">
            <th>Наименование</th>
            <th>Цена</th>
            <th>Ед.изм.</th>
            <th>Дата изм.</th>
            <th>Действия</th>
        </tr>
        <?php if (count($objects)>=1):?>
        <?php foreach ($objects as $object):?>
        <tr>
            <td height="30"><?=$object->name?></td>
            <td><?=$object->price?></td>
            <td><?=$object->units?></td>
            <td><?=$object->date?></td>
            <td><img src="images/edit.png" width="32" height="30" /><img src="images/trash.png" width="32" height="30" /></td>
        </tr>
        <?php endforeach;?>
        <?php else:?>
        <tr>
            <td height="30">Нет материаллов</td>
        </tr>
        <?php endif;?>
    </table>

</div><!--end.table -->
<div class="clr"></div>
<?php if (count($objects)>10):?>
<div class="pagination">
    <img src="images/first.png" width="81" height="22" />
    <ul>
        <a href="#"><li>1</li></a>
        <a href="#"><li>2</li></a>
        <a href="#"><li>3</li></a>
        <a href="#"><li>4</li></a>
        <a href="#"><li>5</li></a>
        <li>..</li>
        <a href="#"><li>34</li></a>
    </ul>
    <img src="images/last.png" width="81" height="22" /></div><!--end.pagination -->
<?php endif;?>