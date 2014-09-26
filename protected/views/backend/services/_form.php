<?php
/* @var $this ServicesController */
/* @var $model Services */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	 'id'=>'services-form',
	 'type'=>'horizontal',
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
    'validateOnSubmit'=>true,
),
)); ?>

    <p class="note">Поля <span class="required">*</span> обязательные.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListRow($model,'active', array( 1=>'Да',0=>'Нет')); ?>
    <?php echo $form->dropDownListRow($model,'category_id', Category::makeTree(0, 0),  array('prompt'=>'Выберите категорию')); ?>
    <?php echo $form->textFieldRow($model,'title',array('size'=>100,'maxlength'=>250, 'class'=>'span4')); ?>
    <?php echo $form->labelEx($model,'announcement'); ?>
    <?php $this->widget('application.extensions.ckeditor.ECKEditor', array(
        'model'=>$model,
        'attribute'=>'announcement',
        'language'=>'ru',
        'editorTemplate'=>'full',
        'height'=>'200px',
        'plugins' => array('wysiwygarea'),
    )); ?>
    <br/>
    <?php echo $form->labelEx($model,'content'); ?>
    <?php $this->widget('application.extensions.ckeditor.ECKEditor', array(
        'model'=>$model,
        'attribute'=>'content',
        'language'=>'ru',
        'editorTemplate'=>'full',
        'height'=>'400px',
        'plugins' => array('wysiwygarea'),
    )); ?>
    <br/>
    <?php echo $form->textFieldRow($model,'link',array('size'=>60,'maxlength'=>100,'class'=>'span5')); ?>



    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=> $model->isNewRecord ? 'Создать' : 'Сохранить',
    ));
    ?>

<?php $this->endWidget(); ?>

</div><!-- form -->