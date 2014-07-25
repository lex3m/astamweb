<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Управление категориями'=>array('index'),
	$model->name,
);
?>

<h1>Просмотр категории <?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        array(
            'label'=>'Родительская категория',
            'value'=> ($model->parent_cat_id != 0) ? $model->parent->name : 'Не задана',
        ),

        'name',
        'description:html',  // description attribute in HTML
        'position',
        array(
            'label'=>'Активно',
            'value'=> ($model->active == 1) ? 'Да' : 'Нет',
        ),

    ),
)); ?>