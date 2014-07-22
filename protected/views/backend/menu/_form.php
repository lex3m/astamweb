<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'menu-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <p class="note">Поля <span class="required">*</span> обязательные.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model,'parent_menu_id', $model->makeTree(0),  array('prompt'=>'Выберите родительское меню:')); ?>
    <?php echo $form->textFieldRow($model,'title',array('size'=>60,'maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'link',array('size'=>20,'maxlength'=>255, 'prepend'=>Yii::app()->request->hostInfo . Yii::app()->request->userHost . Yii::app()->baseUrl . '/')); ?>
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