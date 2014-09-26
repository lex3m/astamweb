<?php
/* @var $this ServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=array(
	'Менеджер услуг',
);

?>
<h1>Управление услугами</h1>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'link',
    'type'=>'primary',
    'label'=>'Создать новую услугу',
    'url' => array('services/create'),
));
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'services-form',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>'{summary}{items}{pager}',
    'enablePagination' => true,
    'summaryText'=>'Отображение {start}-{end} из {count} результатов.',
    'columns'=>array(
        array(
            'class'=>'CCheckBoxColumn',
            'id'=>'itemsSelected',
            'selectableRows' => '2',
            'htmlOptions' => array(
                'class'=>'center',
            ),
        ),
        array('name'=>'id', 'header'=>'#', 'sortable'=>false, 'filter'=>false),
        array(
            'name' => 'active',
            'header' => 'Статус',
            'type' => 'raw',
            'value' => 'Yii::app()->controller->returnStatusHtml($data, "services-form", 1)',
            'htmlOptions' => array('class'=>'infopages_status_column'),
            'filter' => array(0=>'Неактивно', 1=>'Активно'),
            'sortable' => false,
        ),
        array('name'=>'title', 'header'=>'Заголовок'),
        array(
            'name'=>'category_id',
            'value'=>'$data->category->name',
        ),
        array(
            'name'=>'author_id',
            'value'=>'$data->author->username',
        ),
        array('name'=>'date', 'header'=>'Дата создания',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->date, "short", "short")',
            'filter'=>false,
            'htmlOptions'=>array('style'=>'width: 100px'),),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>

<?php
$this->renderPartial('/admin/items-select', array(
    'url' => 'services/processMass',
    'id' => 'services-form',
    'model' => $model,
    'options' => array(
        'activate' => 'Активировать',
        'deactivate' => 'Деактивировать',
        'delete' => 'Удалить',
    ),
));
?>