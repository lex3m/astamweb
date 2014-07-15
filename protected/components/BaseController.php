<?php
/**
 * BaseController is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BaseController extends CController
{
    private $_pageTitle;

    /**
     * @param string $value the page title.
     */
    public function setPageTitle($value)
    {
        $this->_pageTitle=$value;
    }
    /**
     * Override an existing method for better SEO
     * @return string the page title. Defaults to the controller name and the action name.
     */
    public function getPageTitle()
    {
        parent::getPageTitle();

        if($this->_pageTitle!==null)
            return Yii::app()->name.' | '. $this->_pageTitle;
        else
            return Yii::app()->name;

    }

    /**
     * Set a notification flash message
     * @param $message
     */
    public function setNotice($message)
    {
        return Yii::app()->user->setFlash('notice', $message);
    }

    /**
     * Set an error flash message
     * @param $message
     */
    public function setError($message)
    {
        return Yii::app()->user->setFlash('error', $message);
    }
}