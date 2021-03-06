<?php
/**
 * Class PhpAuthManager represents an authorization manager that stores authorization information in terms of a PHP script file.
 */
class PhpAuthManager extends CPhpAuthManager
{
    public function init(){
        if($this->authFile===null){
            $this->authFile=Yii::getPathOfAlias('application.config.auth').'.php';
        }

        parent::init();
        // Для гостей у нас и так роль по умолчанию guest.
        if(!Yii::app()->user->isGuest){
            // Связываем роль, заданную в БД с идентификатором пользователя,
            // возвращаемым UserIdentity.getId().
            if (Yii::app()->user->getRole() != '')
                $this->assign(Yii::app()->user->role, Yii::app()->user->id);
            else {
                $user = User::model()->findByPk(Yii::app()->user->id);
                if ($user)
                    $this->assign($user->role, $user->id);
            }
        }
    }
}