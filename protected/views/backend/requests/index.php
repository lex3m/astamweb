<?php
/* @var $this RequestsController */

$this->pageTitle='Менеджер заявок';

?>

    <h1>Управление заявками</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'requests-form',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>"{items}",
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
        array('name'=>'status',
            'header'=>'Статус',
            'value' => '($data->status == 1) ? "Новая" : "Обработанная"',
            'sortable' => false,
            'filter' => array(1=>'Новая', 2=>'Обработанная'),),
        array('name'=>'client_name', 'header'=>'Имя клиента'),
        array('name'=>'client_phone', 'header'=>'Телефон клиента'),
        array('name'=>'client_email', 'header'=>'E-mail клиента'),
        array('name'=>'date', 'header'=>'Дата заявки',
            'value' => 'Yii::app()->dateFormatter->formatDateTime($data->date, "short", "short")',
            'filter'=>false,
            'htmlOptions'=>array('style'=>'width: 100px'),),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>

<?php
$this->renderPartial('/admin/items-select', array(
    'url' => 'requests/processRequests',
    'id' => 'requests-form',
    'model' => $model,
    'options' => array(
        'new' => 'Новая',
        'processed' => 'Обработанная',
        'delete' => 'Удалить',
    ),
));
?>