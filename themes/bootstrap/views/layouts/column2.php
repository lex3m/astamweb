<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span3">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet');
            $this->widget('bootstrap.widgets.TbMenu', array(
                'type'=>'list',
                'items'=>array(
                    array('label'=>'Структурные разделы'),
                    array('label'=>'Главная', 'icon'=>'home', 'url'=>array('/admin/index')),
                    array('label'=>'Менеджер пользователей', 'icon'=>'user', 'url'=>array('/users/index')),
                    array('label'=>'Менеджер меню', 'icon'=>'list-alt', 'url'=>array('/menu/index'),
                        'items'=>array(
                            array('label'=>'Добавить пункт', 'url'=>array('menu/create')),
                            array('label'=>'Дерево меню', 'url'=>array('menu/index')),
                        )),
                    array('label'=>'Менеджер категорий', 'icon'=>'list', 'url'=>array('category/index')),
                    array('label'=>'Основные разделы'),
                    array('label'=>'Заявки', 'icon'=>'envelope', 'url'=>array('requests/index')),
                    array('label'=>'Услуги', 'icon'=>'pencil', 'url'=>array('services/index')),
                    array('label'=>'Работы', 'icon'=>'folder-open', 'url'=>array('works/index')),
                    array('label'=>'Медиа менеджер', 'icon'=>'picture', 'url'=>array('media/index')),
                    array('label'=>'Отзывы', 'icon'=>'comment', 'url'=>array('reviews/index')),
                    array('label'=>'Дополнительные опции'),
                    array('label'=>'Настройки', 'icon'=>'cog', 'url'=>array('settings/index')),
                    array('label'=>'Тэги', 'icon'=>'tags', 'url'=>array('tags/index'))
                ),
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
    </div>
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>