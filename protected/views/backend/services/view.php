<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Услуги'=>array('index'),
	$model->title,
);
?>

<h2>Просмотр услуги <?php echo $model->title; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array('label'=>'Категория', 'value'=>$model->category->name) ,
		'title',
        'announcement:html',
		'content:html',
        array(
            'label'=>'Активно',
            'value'=> ($model->active == 1) ? 'Да' : 'Нет',
        ),
		'link',
        array('label'=>'Автор', 'value'=>$model->author->username) ,
        array('label'=>'Дата', value=>Yii::app()->dateFormatter->formatDateTime($model->date, "short", "short")),
	),
)); ?>
