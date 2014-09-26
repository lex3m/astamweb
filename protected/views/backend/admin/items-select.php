<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Подтверждение удаления</h4>
</div>

<div class="modal-body">
    <p>Вы действительно хотите удалить эти элементы?</p>
</div>

<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Сохранить изменения',
        'url'=>'#',
        'htmlOptions'=>array('onclick'=>'processMassAction()'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Отмена',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>

<?php $this->endWidget(); ?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => $this->createUrl($url),
        'id'=>'itemsSelected-form',
        'type'=>'inline',
        'enableAjaxValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/arrow_ltr.png', 'arrow', array('style'=> 'margin-bottom:10px;')) ?>
    <?php echo $form->dropDownListRow($model, 'workWithItemsSelected', $options); ?>

    <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'button',
            'type'=>'primary',
            'label'=> 'Применить',
            'htmlOptions'=>array(
                'onclick' => "
                            if($('#itemsSelected-form select').val() != 'delete'){
                                processMassAction();
                            } else {
                                $('#myModal').modal('show')
                            }
                            return false;
                            ",
            ),
        ));
    ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php
    Yii::app()->clientScript->registerScript('confirm-mass-action', "
                function processMassAction(){
                    $('#itemsSelected-form input[name=\"itemsSelected[]\"]').remove();
                    $('#".$id." input[name=\"itemsSelected[]\"]:checked').each(function(){
                        $('#itemsSelected-form').append('<input type=\"hidden\" name=\"itemsSelected[]\" value=\"' + $(this).val() + '\" />');
                    });
                    $.ajax({
                        type: 'post',
                        url: '".$this->createUrl($url)."',
                        data: $('#itemsSelected-form').serialize(),
                        success: function (html) {
                            $('#myModal').modal('hide');
                            $.fn.yiiGridView.update('".$id."');
                        },
                    });
                }

            ", CClientScript::POS_END);
?>


