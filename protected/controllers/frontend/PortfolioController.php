<?php

class PortfolioController extends FrontEndController
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionSites()
    {
        $this->render('sites');
    }

    public function actionApps()
    {
        $this->render('apps');
    }

    public function actionVideos()
    {
        $this->render('videos');
    }

    public function actionPromotions()
    {
        $this->render('sites');
    }

    public function actionAds()
    {
        $this->render('ads');
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