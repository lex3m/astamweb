<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">


    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'category-form',
        'type'=>'horizontal',
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
    <p class="note">Поля <span class="required">*</span> обязательные.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model,'parent_cat_id', $model->makeTree($model->id, 0),  array('prompt'=>'Выберите родительскую категорию:')); ?>
    <?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->textAreaRow($model,'description',array('size'=>20,'maxlength'=>255)); ?>
    <?php echo $form->dropDownListRow($model,'active', array(0=>'Нет', 1=>'Да')); ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=> $model->isNewRecord ? 'Создать' : 'Сохранить',
    ));
    ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->