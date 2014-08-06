<?php
class ContactWidget extends CWidget
{
    public $model;

    public function init()
    {
        parent::init();
        $this->model = new OrderForm();
    }

    public function run()
    {
        $this->render('contactWidget', array('model'=>$this->model));
    }
}