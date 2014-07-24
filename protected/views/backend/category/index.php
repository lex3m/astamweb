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
//        array('name'=>'id', 'header'=>'ID', 'sortable'=>false, 'filter'=>false),
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
                    'url'=>'Yii::app()->createUrl("/apartments/backend/main/move", array("id"=>$data->id, "direction" => "down", "catid" => "0"))',
                    'options' => array('class'=>'infopages_arrow_image_up'),

//                    'visible' => '$data->sorter < "'.$maxSorter.'"',
                    'click' => "js: function() { ajaxMoveRequest($(this).attr('href'), 'category-form'); return false;}",
                ),
                'down' => array(
                    'label' => 'Опустить вниз',
                    'imageUrl' => $url = Yii::app()->assetManager->publish(
                        Yii::getPathOfAlias('zii.widgets.assets.gridview').'/down.gif'
                    ),
                    'url'=>'Yii::app()->createUrl("/apartments/backend/main/move", array("id"=>$data->id, "direction" => "up", "catid" => "0"))',
                    'options' => array('class'=>'infopages_arrow_image_down'),
//                    'visible' => '$data->sorter > 1',
                    'click' => "js: function() { ajaxMoveRequest($(this).attr('href'), 'category-form'); return false;}",
                ),
            ),
            'htmlOptions'=>array('style'=>'width: 100px'),
        ),
    )));
?>
<!--<div id="confirmDiv"></div>
<div class='gridview-control-line'>
    <?php
/*    echo CHtml::beginForm($this->createUrl($url), 'post', array('id'=>'itemsSelected-form'));
    */?>
    <img alt="" src="<?php /*echo Yii::app()->request->baseUrl; */?>/images/arrow_ltr.png"/>
    <?php
/*    echo Yii::t('common', 'With selected').': ';
    echo CHtml::DropDownList('workWithItemsSelected', $model->WorkItemsSelected, $options).' ';

    Yii::app()->clientScript->registerScript('confirm-mass-action', "
			function processMassAction(){
				$('#itemsSelected-form input[name=\"itemsSelected[]\"]').remove();
				$('#".$id." input[name=\"itemsSelected[]\"]:checked').each(function(){
					$('#itemsSelected-form').append('<input type=\"hidden\" name=\"itemsSelected[]\" value=\"' + $(this).val() + '\" />');
				});
				$.ajax({
					type: 'post',
					url: '".$this->createUrl($url)."',
					data: $('#itemsSelected-form').serialize(),
					success: function (html) {
						$.fn.yiiGridView.update('".$id."');
					},
				});
			}
		", CClientScript::POS_END);

    echo CHtml::button(
        Yii::t('common', 'Do'),
        array(
            'class' => 'btn btn-primary',
            'onclick' => "
					if($('#workWithItemsSelected').val() != 'delete'){
						processMassAction();
					} else {
						$(\"#confirmDiv\").confirmModal({
							heading: '".tc('Request for confirmation')."',
							body: '".tc('Are you sure?')."',
							confirmButton: '".tc('Yes')."',
							closeButton: '".tc('Cancel')."',
							callback: function () {
								processMassAction();
							}
						});
					}

					return false;
				",
        )
    );
    echo CHtml::endForm(); */?>
</div>-->
