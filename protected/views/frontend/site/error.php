<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle='Ошибка '.$code;
$this->breadcrumbs=array(
	'Ошибка',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>