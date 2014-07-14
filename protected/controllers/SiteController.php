<?php

class SiteController extends Controller
{
	/**
     *  Саш, у меня есть к тебе деликатная просьбочка, как к профи) Я пока не хочу давать огласке, у меня в августе будет свадьба. Ты сможешь нарисовать дизайн для пригласительных? Мне нравятся по оформлению http://www.nastyarai.ru/images/inv/219/1.jpg http://krsvadba.ru/uploads/posts/2013-07/1373977264_27-svadebnye-prriglasitelnye-foto.jpg http://krsvadba.ru/uploads/posts/2013-07/1373977328_11-svadebnye-prriglasitelnye-foto.jpg http://img15.slando.ua/images_slandocomua/72163753_4_644x461_priglasheniya-na-svadbu-ruchnaya-rabota-biznes-i-uslugi_rev005.jpg это на лицевую сторону и http://www.anna-photo.org.ua/images/stories/svadeb/priglas/photo04.jpg (можно без фоновых фоток, просто белую подкладку) http://www.lightpixel.ru/uploads/posts/2011-09/thumbs/1314899390_shablon-priglasheniya-na-svadbu.jpg http://odamochka.info/uploads/taginator/Jan-2013/priglasheniya-na-svadbu.jpg это на внутреннюю сторону, свадьба у нас предположительно будет в корралово-мятных тонах, так что если сможешь, то как нибудь в этой цветовой палитре оформи пожалуйста) размеры пригласительного примерно 14х10 см. Заранее спасибо, и что с меня причитается?))))
    [17:05:05] Alexey: дата 29.08.2014 Имена Алексей и Алина (это для лицевой стороны, если что))

     * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}