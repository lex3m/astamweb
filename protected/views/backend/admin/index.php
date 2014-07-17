<?php
/* @var $this AdminController */
?>
<style>
    .bs-glyphicons {
        margin-right: 0;
        margin-left: 0;
    }
    .bs-glyphicons {
        margin: 0 -10px 20px;
        overflow: hidden;
    }
    .bs-glyphicons-list {
        padding-left: 0;
        list-style: none;
    }
    .bs-glyphicons li {
        width: 12.5%;
        font-size: 12px;
    }
    .bs-glyphicons li {
        float: left;
        width: 25%;
        padding: 10px;
        font-size: 10px;
        line-height: 1.4;
        text-align: center;
        background-color: #f9f9f9;
        border: 1px solid #fff;
    }
    .bs-glyphicons .glyphicon {
        margin-top: 5px;
        margin-bottom: 10px;
        font-size: 24px;
    }
    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        font-style: normal;
        font-weight: 400;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .bs-glyphicons .glyphicon-class {
        display: block;
        text-align: center;
        word-wrap: break-word;
    }
</style>
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
            <a href="<?php echo Yii::app()->createUrl('categories/index')?>" class="thumbnail" rel="tooltip" data-title="Менеджер категорий">
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
