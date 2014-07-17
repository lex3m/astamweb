<?php
/* @var $this UsersController */

$this->pageTitle='Менеджер пользователей';

?>

<h1>Управление пользователями</h1>

<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'button',
        'type'=>'primary',
        'label'=>'Создать нового пользователя',
        'url' => 'users/create',
    ));
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'username', 'header'=>'Имя пользователя'),
        array('name'=>'email', 'header'=>'Email'),
        array('name'=>'role', 'header'=>'Роль'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
