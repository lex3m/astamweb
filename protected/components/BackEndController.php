<?php
/**
 * BackEndController is the controller for administrative part of site
 * All BackEnd controllers classes for this application should extend from this class.
 */
class BackEndController extends BaseController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /*
        Фильтры
    */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /*
        Права доступа
    */
    public function accessRules()
    {
        return array(
            // даем доступ только админам и модераторам
            array(
                'allow',
                'roles'=>array(User::ROLE_ADMIN, User::ROLE_MODER),
            ),
            // всем остальным разрешаем посмотреть только на страницу авторизации
            array(
                'allow',
                'actions'=>array('login', 'error'),
                'users'=>array('?'),
            ),
            // запрещаем все остальное
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }

    public static function returnStatusHtml($data, $tableId, $onclick = 0){
        $url = Yii::app()->controller->createUrl("activate", array("id" => $data->id, "action" => ($data->active==1?'deactivate':'activate'), "model"=> get_class($data) ));
        $img = CHtml::image(
            Yii::app()->request->baseUrl.'/images/'.($data->active?'':'in').'active.png',
            $data->active ? 'Активно':'Неактивно',
            array('title' => $data->active?'Деактивировать':'Активировать')
        );
        $options = array();
        if($onclick){
            $options = array(
                'onclick' => 'ajaxSetStatus(this, "'.$tableId.'"); return false;',
            );
        }
        return '<div align="center">'.CHtml::link($img,$url, $options).'</div>';
    }

    /**
     * Set active / inactive category
     * @throws CHttpException
     */
    public function activate($id, $action, $model)
    {
        if (isset($_GET['ajax'])) {
            $id = (int)Yii::app()->request->getParam('id');
            $action = Yii::app()->request->getParam('action');
            $model = Yii::app()->request->getParam('model');
            $category = $this->loadModels($id, $model);
            switch($action) {
                case 'activate': $category->active = 1; break;
                case 'deactivate': $category->active = 0; break;
            }
            if(!$category->update())
                throw new CHttpException(400,'Ошибка в запросе');
            else
                return true;

        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return the loaded model
     * @throws CHttpException
     */
    public function loadModels($id, $model)
    {
        $model=$model::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}