<?php

/**
 * WebUser represents the persistent state for a Web application user
 */
class WebUser extends CWebUser
{
    private $_model = null;

    /**
     * BeforeLogin function for identify user with cookie AuthKey
     * @param mixed $id
     * @param array $states
     * @param bool $fromCookie
     * @return bool
     */

    protected function beforeLogin($id,$states,$fromCookie)
    {
        parent::beforeLogin($id,$states,$fromCookie);

        if ($user = $this->getModel($id, array('select' => 'authKey'))) {
            if ($user->authKey == $states['authKey'])
                return true;
        } else {
            return false;
        }
    }


    /**
     * Get user role
     * @return mixed
     */
    function getRole() {
        if(!$this->isGuest && $user = $this->getModel($this->id, array('select' => 'role'))){
            return $user->role;
        }
    }

    /**
     * @param int $id
     * @param array $params
     * @return CActiveRecord|null
     */
    private function getModel($id, $params){
        if ($this->_model === null){
            $this->_model = User::model()->findByPk($id, $params);
        }
        return $this->_model;
    }
}