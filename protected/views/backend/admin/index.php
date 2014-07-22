<?php
/* @var $this AdminController */
?>

<div class="bs-glyphicons">
    <ul class="bs-glyphicons-list">
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('admin/index')?>" class="thumbnail" rel="tooltip" data-title="Главная">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('users/index')?>" class="thumbnail" rel="tooltip" data-title="Менеджер пользователей">
                <i class="icon-user"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('menu/index')?>" class="thumbnail" rel="tooltip" data-title="Менеджер меню">
                <i class="icon-list-alt"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('category/index')?>" class="thumbnail" rel="tooltip" data-title="Менеджер категорий">
                <i class="icon-list"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('requests/index')?>" class="thumbnail" rel="tooltip" data-title="Заявки">
                <i class="icon-envelope"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('services/index')?>" class="thumbnail" rel="tooltip" data-title="Услуги">
                <i class="icon-pencil"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('works/index')?>" class="thumbnail" rel="tooltip" data-title="Работы">
                <i class="icon-folder-open"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('media/index')?>" class="thumbnail" rel="tooltip" data-title="Мели менеджер">
                <i class="icon-picture"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('reviews/index')?>" class="thumbnail" rel="tooltip" data-title="Отзывы">
                <i class="icon-comment"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('settings/index')?>" class="thumbnail" rel="tooltip" data-title="Настройки">
                <i class="icon-cog"></i>
            </a>
        </li>
        <li class="span3">
            <a href="<?php echo Yii::app()->createUrl('tags/index')?>" class="thumbnail" rel="tooltip" data-title="Тэги">
                <i class="icon-tags"></i>
            </a>
        </li>
    </ul>
</div>
