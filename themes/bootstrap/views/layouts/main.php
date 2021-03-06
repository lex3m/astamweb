<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'brandUrl'=> Yii::app()->homeUrl,
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Сайт', 'url'=>Yii::app()->createAbsoluteUrl('/')),
                array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/admin/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
		    'homeLink' => CHtml::link('Админпанель', Yii::app()->homeUrl),
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Копирайт &copy; <?php echo date('Y'); ?> АстамВЕБ.<br/>
	</div><!-- footer -->

</div><!-- page -->
<?php
Yii::app()->clientScript->registerScript('ajax-status', "
    function ajaxSetStatus(elem, id){
        $.ajax({
            url: $(elem).attr('href'),
            data: {ajax:1},
            method: 'get',
            success: function(){
                $('#'+id).yiiGridView.update(id);
            }
        });
    }


", CClientScript::POS_END);
?>
</body>
</html>
