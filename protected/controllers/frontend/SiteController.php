<?php

class SiteController extends FrontEndController
{
	/**
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
				Yii::app()->user->setFlash('contact','Спасибо за Вашу заявку. Наши менеджеры свяжутся с Вами ближайшее время.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    /**
     * Process order form
     */
    public function actionOrder()
    {
        $model=new OrderForm;

        if(Yii::app()->request->isAjaxRequest && isset($_POST['OrderForm']))
        {
//            print_r($_POST); print_r($_FILES); exit;
            $model->attributes=$_POST['OrderForm'];
            if (!empty($_POST['OrderForm']['msg']))
                $model->msg = $_POST['OrderForm']['msg'];

            if ($document=CUploadedFile::getInstance($model,'file')) {
                $model->file = $document;
            }
            if($model->validate())
            {
                /*$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);*/
               /* $email = Yii::app()->email;
                $email->to = Yii::app()->params['adminEmail'];
                $email->subject = 'Заказ обратного звонка';*/
//                $email->view = 'mailtpl';


                $message = new YiiMailMessage;
                $message->view = 'mailtpl';

                //model is passed to the view
                $model->type = 'Вам поступила заявка c формы обратной связи';
                $message->setBody(array('client'=>$model), 'text/html');
                if ($model->file) {
                    $path = Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR.$model->file;
                    $model->file->saveAs($path);
                    $swiftAttachment = Swift_Attachment::fromPath($path);
                    $message->attach($swiftAttachment);

                }

                $message->addTo(Yii::app()->params['adminEmail']);
                $message->from = 'no-reply@astamweb.ru';
                $message->subject = 'Заявка с формы обратной связи АстамВеб';

                Yii::app()->mail->send($message);

                echo CJSON::encode(array(
                    'status'=>'success'
                ));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

}