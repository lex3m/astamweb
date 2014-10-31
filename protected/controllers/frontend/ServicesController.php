<?php

class ServicesController extends FrontEndController
{
	public function actionIndex()
	{
        $model = Services::model()->findAll();
        $data = array();
        foreach ($model as $value) {
            if ($value->category->parent_cat_id == 0)
                $data[$value->category->id] = $value;
            else
                $data[$value->category->parent_cat_id] =  $value;
        }
		$this->render('index', array('model'=>$model));
	}

    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}