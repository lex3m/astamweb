<?php
class OrderWidget extends CWidget
{
    public $model;

    public function init()
    {
        parent::init();
        $this->model = new OrderForm();
    }

    public function run()
    {
        $this->render('orderWidget', array('model'=>$this->model));
    }
}