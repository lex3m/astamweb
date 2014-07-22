<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    private $_id;
	/**
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//        echo CPasswordHelper::hashPassword($this->password);exit;
        $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));

		if($user == NULL)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->username=$user->username;
            $this->setState('profile', $user->profile);
            $authKey = $user->generateCookieKey();
            $this->setState('authKey', $authKey);
            $user->authKey = $authKey;
            $user->scenario = 'authKey';
            $user->save();
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
	}

    public function getId()
    {
        return $this->_id;
    }

}