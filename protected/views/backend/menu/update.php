<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Управление меню'=>array('index'),
	$model->title => array('index'),
	'Обновление',
);
?>

<h1>Обновление пункта меню <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>