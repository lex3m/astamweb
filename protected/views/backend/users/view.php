<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->username,
);
?>

<h1>Просмотр пользователя <?php echo $model->username; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
)); ?>
