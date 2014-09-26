<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Услуги'=>array('index'),
	'Создание',
);
?>

<h2>Создание услуги</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>