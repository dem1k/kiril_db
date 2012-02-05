<div class="clr"></div>
<div class="title"><h1><?=$title?></h1></div>
<div class="add">
    <a href="/drivers/create/"> <input type="submit" value="  " /> </a></div>
<div class="clr"></div>
<div class="table">
    <table id ="datatable" width="100%" border="0" cellspacing="0" cellpadding="0">
        <thead class="table_title">
            <th width="70%">Имя</th>
            <th>Rate</th>
            <th>Дата изм.</th>
            <th>Действия</th>
        </thead>
        <?php if (count($objects)>=1):?>
            <?php foreach ($objects as $object):?>
        <tr>
            <td height="30"><?=$object->name?></td>
            <td><?=$object->rate?></td>
            <td><?= date('d.m.Y',$object->date)?></td>
            <td>
                <a href="/teams/edit/<?=$object->id?>/"><img src="/assets/html/images/edit.png" width="32" height="30" /></a>
                <a href="/teams/delete/<?=$object->id?>/"><img src="/assets/html/images/trash.png" width="32" height="30" /></a>
            </td>
        </tr>
            <?php endforeach;?>
        <?php else:?>
        <tr>
            <td height="30">Нет водителей</td>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
        </tr>
        <?php endif;?>
    </table>

</div><!--end.table -->
<div class="clr"></div>
<?php if (count($objects)>10):?>
<div class="pagination">
    <img src="/assets/html/images/first.png" width="81" height="22" />
    <ul>
        <a href="#"><li>1</li></a>
        <a href="#"><li>2</li></a>
        <a href="#"><li>3</li></a>
        <a href="#"><li>4</li></a>
        <a href="#"><li>5</li></a>
        <li>..</li>
        <a href="#"><li>34</li></a>
    </ul>
    <img src="/assets/html/images/last.png" width="81" height="22" /></div><!--end.pagination -->
<?php endif;?>

<script type="text/javascript" src="/assets/html/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$('#datatable').dataTable( {
		"bPaginate": false,
		"bLengthChange": false,
		"bFilter": false,
		"bSort": false,
		"bInfo": false,
		"bAutoWidth": false } );
} );
</script>