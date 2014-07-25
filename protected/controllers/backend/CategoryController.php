<?php

class CategoryController extends BackEndController
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
			'postOnly + delete, processCategory', // we only allow deletion via POST request
            'ajaxOnly + move'
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
				'actions'=>array('create','update', 'processCategory','index','view','admin','delete', 'move'),
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
		$model=new Category;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
            $model->position = 1;
			if($model->save()) {
                $model->normalize();
                $this->redirect(array('index'));
            }

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

        $this->performAjaxValidation($model);

		if(isset($_POST['Category']))
		{
			$model->attributes=$_POST['Category'];
			if($model->save()) {
                $model->normalize();
                $this->redirect(array('index'));
            }
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
	 * Lists and manages all models.
	 */
	public function actionIndex()
	{
        $model=new Category('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Category']))
            $model->attributes=$_GET['Category'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

    /**
     * Process category actions update, delete
     */
    public function actionProcessCategory()
    {
       if (isset($_POST['Category']) && !empty($_POST['itemsSelected'])) {
            $type = Yii::app()->request->getPost('Category');
            $itemsSelected = Yii::app()->request->getPost('itemsSelected');
            foreach($itemsSelected as $k => $v) {
                $model=$this->loadModel($v);
                switch($type['workWithItemsSelected']) {
                    case 'activate': $active = 1; $model->updateBranch($active);break;
                    case 'deactivate': $active = 0; $model->updateBranch($active); break;
                    case 'delete': $model->deleteBranch(); break;
                }
            }

       }
        // if AJAX request (triggered by process category via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Move category in direction
     */
    public function actionMove()
    {
        if (isset($_GET['ajax'])) {
            $id = (int)Yii::app()->request->getParam('id');
            $direction = Yii::app()->request->getParam('direction');

            $category = $this->loadModel($id);

            switch($direction){
                case 'up':
                    $prev = $category->prevRecord();
                    $prev->position = $prev->position+1;
                    $prev->save();
                    $category->position=$category->position-1;
                    break;
                case 'down':
                    $next = $category->nextRecord();
                    $next->position = $next->position-1;
                    $next->save();
                    $category->position=$category->position+1;
                    break;
                default:
                    throw new CHttpException(400, 'Команда не найдена');
            }
            if(!$category->update())
                throw new CHttpException(400,'Ошибка в запросе');

            $category->normalize();
        }
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Category the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Category $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
