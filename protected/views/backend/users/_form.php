<?php
/* @var $this UsersController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

	<p class="note">Поля <span class="required">*</span> обязательные.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'username',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->passwordFieldRow($model,'password',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>
    <?php echo $form->dropDownListRow($model,'role', $model->getRoles()); ?>

    <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=> $model->isNewRecord ? 'Создать' : 'Сохранить',
        ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->