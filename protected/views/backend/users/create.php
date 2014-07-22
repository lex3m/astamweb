<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Создание',
);

?>

<h1>Создание пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>