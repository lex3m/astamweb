<?php
/* @var $this RequestsController */
/* @var $model Requests */

$this->breadcrumbs=array(
	'Заявки'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
	'Просмотр заявки № ' . $model->id,
);
?>

<h1>Просмотр заявки № <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>