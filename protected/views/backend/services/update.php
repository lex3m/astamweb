<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Услуги'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Обновление',
);
?>

<h2>Обновление услуги <?php echo $model->title; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>