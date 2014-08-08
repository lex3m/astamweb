<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $profile
 * @property string $authKey
 * @property string $role
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 */
class User extends CActiveRecord
{
    const ROLE_ADMIN = 'administrator';
    const ROLE_MODER = 'moderator';

    private static $_roles = array(self::ROLE_ADMIN, self::ROLE_MODER);

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, role', 'required', 'on'=>'create'),
            array('username, email', 'unique', 'on'=>'create'),
            array('email', 'email', 'on'=>'create'),
			array('username, password, email, authKey, role', 'length', 'max'=>128, 'on'=>'create'),
			array('profile', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, profile, authKey, role', 'safe', 'on'=>'search'),
            array('username, email, role', 'required', 'on'=>'update'),
            array('username, email', 'unique', 'on'=>'update'),
            array('email', 'email', 'on'=>'update'),
            array('username, password, email, authKey, role', 'length', 'max'=>128, 'on'=>'update'),
            array('authKey', 'required', 'on'=>'authKey')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Логин',
			'password' => 'Пароль',
			'email' => 'Email',
			'profile' => 'Профиль',
			'authKey' => 'Ключ авторизации',
			'role' => 'Роль',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('authKey',$this->authKey,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Compare password with hash
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password,$this->password);
    }

    /**
     * Hashes a user password
     * @param $password
     * @return string
     */
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

    /**
     * Generates random value for cookie key
     * @return string
     */
    public function generateCookieKey()
    {
        return crypt(self::randString(), self::generateSalt());
    }

    /**
     * Generates a random string
     * @param int $length
     * @return string
     */
    public static function randString($length = 10)
    {
        $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
        shuffle($chars);
        return implode('', array_slice($chars, 0, $length));
    }

    /**
     * Generates a salt that can be used to generate a cookie key.
     * @return string the salt
     */
    public function generateSalt()
    {
        return uniqid('', true);
    }

    /**
     * Set user password before save new record
     * @return bool
     */
    public function beforeSave()
    {
        if ($this->scenario == 'create' || $this->scenario == 'update')
            if ($this->password != '')
                $this->password = self::hashPassword($this->password);
        return parent::beforeSave();
    }

    public function getRoles()
    {
        if (isset(self::$_roles)){
            $roles = array();
            foreach(self::$_roles as $k => $v)
                $roles[$v] = $v;
            return $roles;
        }
    }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
