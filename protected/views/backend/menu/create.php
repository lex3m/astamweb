<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Управление меню'=>array('index'),
	'Создание',
);
?>
<h1>Создание нового пункта меню</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>