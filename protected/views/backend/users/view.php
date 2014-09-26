<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->username,
);
?>

<h2>Просмотр пользователя <?php echo $model->username; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
)); ?>
