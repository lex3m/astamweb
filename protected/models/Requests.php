<?php

/**
 * This is the model class for table "{{requests}}".
 *
 * The followings are the available columns in table '{{requests}}':
 * @property string $id
 * @property string $client_name
 * @property string $client_phone
 * @property string $client_email
 * @property string $document
 * @property string $message
 * @property integer $status
 * @property string $date
 */
class Requests extends CActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_READ = 2;

    public $workWithItemsSelected;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{requests}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_name, client_phone', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('client_name, client_email', 'length', 'max'=>128),
			array('client_phone', 'length', 'max'=>15),
            array('client_phone', 'match', 'pattern'=>'/^(\(\d{3}\)\s*)*\d{3}(-{0,1}|\s{0,1})\d{2}(-{0,1}|\s{0,1})\d{2}$/'),
			array('document', 'length', 'max'=>255),
            array('document', 'file',
                'allowEmpty' => true,
                'types'=> 'doc, docx, pdf, odt, xls, xlsx, csv, rtf, txt',
                'maxSize' => 1024 * 1024 * 5, // 5MB!
                'tooLarge' => 'Размер файла превышает 5MB. Пожалуйста, загрузите файл меньшего размера.',
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_name, client_phone, client_email, document, message, status, date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_name' => 'Имя клиента',
			'client_phone' => 'Телефон клиента',
			'client_email' => 'E-mail клиента',
			'document' => 'Документ',
			'message' => 'Сообщение',
			'status' => 'Статус',
			'date' => 'Дата заявки',
            'workWithItemsSelected' => 'С отмеченными:'
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('client_phone',$this->client_phone,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('document',$this->document,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->date = new CDbExpression('NOW()');
            $this->status = self::STATUS_NEW;
        }

        return parent::beforeSave();
    }

    public static function getUnreadRequests() {
        return self::model()->  countByAttributes(array(
            'status'=> self::STATUS_NEW
        ));

    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Requests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
