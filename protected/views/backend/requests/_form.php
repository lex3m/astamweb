<?php
/* @var $this RequestsController */
/* @var $model Requests */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'requests-form',
        'type'=>'horizontal',
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>


    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model,'status', array(Requests::STATUS_NEW=>'Новая', Requests::STATUS_READ=>'Обработанная')); ?>
    <?php echo $form->textFieldRow($model, 'client_name', array('readonly'=>true)); ?>
    <?php echo $form->textFieldRow($model,'client_phone', array('readonly'=>true)); ?>
    <?php echo $form->textFieldRow($model,'client_email',array('readonly'=>true)); ?>
    <?php echo $form->textFieldRow($model,'document',array('readonly'=>true)); ?>
    <?php if (!empty($model->document)):?>
    <div class="control-group">
        <div class="controls">
            <a href="<?php echo Yii::app()->request->baseUrl.'/uploads/'.$model->document;?>">Скачать документ</a>
        </div>
    </div>
    <?php endif;  ?>
    <?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50, 'readonly'=>true)); ?>
    <?php echo $form->textFieldRow($model, 'date', array('readonly'=>true, 'value'=>Yii::app()->dateFormatter->formatDateTime($model->date, "short", "short"))); ?>



    <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=> $model->isNewRecord ? 'Создать' : 'Сохранить',
        ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->