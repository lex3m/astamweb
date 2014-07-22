<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->username=>array('view','id'=>$model->id),
	'Обновление',
);
?>

<h1>Обновление данных пользователя <?php echo $model->username; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>