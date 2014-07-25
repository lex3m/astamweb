<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Управление категориями'=>array('index'),
	'Создание',
);

?>

<h1>Создание категории</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>