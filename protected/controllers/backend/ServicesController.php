<?php

class ServicesController extends BackEndController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete ', // we only allow deletion via POST request
            'ajaxOnly + processMass'
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
            array('allow', // allow admin and moder user
                'actions'=>array('create','update', 'activate', 'index','view','admin','delete', 'processMass'),
                'roles' => array(User::ROLE_MODER, User::ROLE_ADMIN),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Services;
        $model->scenario = 'create';
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $model->scenario = 'update';
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new Services('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Services']))
            $model->attributes=$_GET['Services'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Services('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Services']))
			$model->attributes=$_GET['Services'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    /**
     * Set active / inactive category
     * @throws CHttpException
     */
    public function actionActivate()
    {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['ajax'])) {
            $id = (int)Yii::app()->request->getParam('id');
            $action = Yii::app()->request->getParam('action');
            $model = Yii::app()->request->getParam('model');
            if($this->activate($id, $action, $model))
                return true;
        } else {
            $this->redirect('index');
        }
    }

    /**
     * Process category actions update, delete
     */
    public function actionProcessMass()
    {
        if (isset($_POST['Services']) && !empty($_POST['itemsSelected'])) {
            $type = Yii::app()->request->getPost('Services');
            $itemsSelected = Yii::app()->request->getPost('itemsSelected');
            foreach($itemsSelected as $k => $v) {
                $model=$this->loadModel($v);
                switch($type['workWithItemsSelected']) {
                    case 'activate': $model->active = 1; $model->update();break;
                    case 'deactivate': $model->active = 0; $model->update();break;
                    case 'delete': $model->delete(); break;
                }
            }

        }
        // if AJAX request (triggered by process category via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Services the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Services::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Services $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='services-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
