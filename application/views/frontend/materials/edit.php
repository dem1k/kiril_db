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
<div class="add_materials">
    <?= form_open('/materials/edit/'.$object->id);?>
    <?=form_input(array(
            'name'        => 'name',
            'id'          => 'name',
            'value'=>set_value('name',$object->name),
            )
            )?>
    <div class="add_materails_field">
        <ul>
            <li>Цена:<?=form_input(array(
                        'name'        => 'price',
                        'id'          => 'price',
                        'value'=>set_value('price',$object->price),
                        )
                        )?></li>
            <li>Ед. изм.<?=form_input(array(
                        'name'        => 'units',
                        'id'          => 'units',
                        'value'=>set_value('units',$object->units),
                        )
                        )?></li>
            <li>Дата изменения:<?=form_input(array(
                        'name'        => 'date',
                        'id'          => 'date',
                        'value'=>set_value('date', date('d.m.Y',$object->date)),
                        )
                        )?></li>
        </ul>
        <input name="cancel" type="button" onclick="history.back();return false;" value=" " id="cancel" />
        <input name="action" type="hidden"  value="save" />


        <input name="send" type="submit" id="send" value=" " />
    </div><!--end.add_materials_field -->
</div><!--end.add_materials -->
<?= form_close();?>