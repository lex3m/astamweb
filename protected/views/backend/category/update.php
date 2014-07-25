<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Управление категориями'=>array('index'),
	'Обновление',
);

?>

<h2>Обновление категории <?php echo $model->name; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>