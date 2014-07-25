<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle='Менеджер категорий';
?>

<h1>Управление категориями</h1>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'link',
    'type'=>'primary',
    'label'=>'Создать новую категорию',
    'url' => array('category/create'),
));
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'category-form',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template' => '{items}',
    'columns'=>array(
        array(
            'class'=>'CCheckBoxColumn',
            'id'=>'itemsSelected',
            'selectableRows' => '2',
            'htmlOptions' => array(
                'class'=>'center',
            ),
        ),
        array('name'=>'id', 'header'=>'ID', 'sortable'=>false, 'filter'=>false),
        array(
            'name' => 'active',
            'header' => 'Статус',
            'value' => '($data->active == 1) ? "Активно" : "Неактивно"',
            'sortable' => false,
            'filter' => array(0=>'Неактивно', 1=>'Активно'),
        ),
        array('name'=>'name',
            'header'=>'Название категории',
            'value'=>'($data->indent == 0 ) ? "" . str_repeat("─", $data->indent) ." ". CHtml::encode($data->name) : "└"  . str_repeat("—", $data->indent) ." ". CHtml::encode($data->name)',
            'sortable' => false,
        ),
        array('name'=>'description',
            'header'=>'Описание',
            'sortable' => false,),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{up}{down}{view}{update}{delete}',
            'viewButtonUrl' => "Yii::app()->createUrl('category/view', array('id' => \$data->id))",
            'htmlOptions' => array('class'=>'width120'),
            'buttons' => array(
                'up' => array(
                    'label' => 'Поднять вверх',
                    'imageUrl' => $url = Yii::app()->assetManager->publish(
                        Yii::getPathOfAlias('zii.widgets.assets.gridview').'/up.gif'
                    ),
                    'url'=>'Yii::app()->createUrl("category/move", array("id"=>$data->id, "direction" => "up"))',
                    'options' => array('class'=>'infopages_arrow_image_up'),
                    'visible' => '$data->position > 1',
                    'click' => "js: function() { ajaxMoveRequest($(this).attr('href'), 'category-form'); return false;}",
                ),
                'down' => array(
                    'label' => 'Опустить вниз',
                    'imageUrl' => $url = Yii::app()->assetManager->publish(
                        Yii::getPathOfAlias('zii.widgets.assets.gridview').'/down.gif'
                    ),
                    'url'=>'Yii::app()->createUrl("category/move", array("id"=>$data->id, "direction" => "down"))',
                    'options' => array('class'=>'infopages_arrow_image_down'),
                    'visible' => '$data->position < Category::getMaxPosition($data->parent_cat_id)',
                    'click' => "js: function() { ajaxMoveRequest($(this).attr('href'), 'category-form'); return false;}",
                ),
            ),
            'htmlOptions'=>array('style'=>'width: 100px'),
        ),
    )));
?>
<?php
$this->renderPartial('/admin/items-select', array(
    'url' => 'category/processCategory',
    'id' => 'category-form',
    'model' => $model,
    'options' => array(
        'activate' => 'Активировать',
        'deactivate' => 'Деактивировать',
        'delete' => 'Удалить',
    ),
));
?>
<?php
Yii::app()->clientScript->registerScript('move-category-action', "
    function ajaxMoveRequest(url, tableId){
        $.ajax({
            url: url,
            data: {ajax:1},
            method: 'get',
            success: function(){
                $('#'+tableId).yiiGridView.update(tableId);
            }
        });
    }

", CClientScript::POS_END);
?>