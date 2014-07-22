<?php

class MenuController extends BackEndController
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + deleteItem', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','view', 'createNewItem','update', 'deleteItem', 'rename', 'getPageList', 'setVisible', 'move', 'create'),
                'roles' => array(User::ROLE_MODER, User::ROLE_ADMIN)
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCreateNewItem(){
        echo Menu::create($_POST)->id;
    }

    public function actionRename()
    {
        if (isset($_POST) && !empty($_POST)) {
            $item = $this->loadModel($_POST['pid']);
            $item->rename($_POST['title']);
        }

    }

    public function actionSetVisible()
    {
        if (Yii::app()->request->isPostRequest) {
            $item = $this->loadModel($_POST['pid']);
            $item->setVisible($_POST['visible']);
        }
    }

    public function actionDeleteItem()
    {
        if (Yii::app()->request->isPostRequest) {
            $item = $this->loadModel(Yii::app()->request->getParam('pid'));
            $item->deleteBranch();
        }
    }

    public function actionMove()
    {
        if (Yii::app()->request->isPostRequest) {
            if (isset($_POST['ref']) && isset($_POST['pos'])) {
                $item = $this->loadModel(Yii::app()->request->getParam('pid'));
                $item->move($_POST['ref'], $_POST['pos']);
            }

        }
    }

    public function actionUpdate($id)
    {
        $item = $this->loadModel($id);
        $this->performAjaxValidation($item);

        if(isset($_POST['Menu']))
        {
            $item->attributes=$_POST['Menu'];
            if($item->save())
                $this->redirect(array('index'));
        }

        $this->render('update',array(
            'model'=>$item,
        ));
    }

    public function actionCreate()
    {
        $item = new Menu();
        $this->performAjaxValidation($item);

        if (isset($_POST['Menu'])) {
            $item->attributes = $_POST['Menu'];
            if ($item->save()) {
                $this->redirect(array('index'));
            } else {
                throw new CHttpException(400, 'Невозможно создать новый пункт меню');
            }
        }

        $this->render('create', array('model'=>$item));
    }

    public function actionGetPageList(){
        echo json_encode(array(
            'data' => 'Главное меню',
            'state' => 'open',
            'attr' => array('rel' => 'root', 'pid' => 0),
            'children' => Menu::buildTreePages(0),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Menu::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}