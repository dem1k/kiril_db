<script type="text/javascript" src="/assets/html/js/jquery.datePicker.js"></script>
<script type="text/javascript" src="/assets/html/js/jquery.ui.datepicker-ru.js"></script>
<script>
    $(function() {
        $( "#date" ).datepicker({
            dateFormat: 'dd.mm.yy'
        });
        $("#date").datepicker($.datepicker.regional['ru']);
    });

</script>
<div class="clr"></div>
<h1>Создать водителя</h1>
<div class="add_materials">
    <?=form_open('/drivers/create');?>
    <?=form_input(array(
            'name'        => 'name',
            'id'          => 'name',
            )
            )?>
    <div class="add_materails_field">
        <ul>
            <li>Rate: <?=form_input(array(
                        'name'        => 'rate',
                        'id'          => 'rate',
                        )
                        )?></li>
            <li>Дата изменения: <?=form_input(array(
                        'name'        => 'date',
                        'id'          => 'date',
                        )
                        )?></li>
        </ul>
        <input name="cancel" type="button" onclick="history.back();return false;" value=" " id="cancel" />
        <input name="action" type="hidden"  value="save" />


        <input name="send" type="submit" id="send" value=" " />
    </div><!--end.add_materials_field -->
</div><!--end.add_materials -->
<?= form_close();?>