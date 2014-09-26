<?php

/**
 * This is the model class for table "{{services}}".
 *
 * The followings are the available columns in table '{{services}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $active
 * @property string $date
 * @property string $announcement
 * @property string $link
 * @property integer $author_id
 * @property string $category_id
 */
class Services extends CActiveRecord
{
    public $workWithItemsSelected;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{services}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, active, announcement, link, category_id', 'required', 'on'=>'create'),
            array('title, content, announcement, link, category_id', 'required', 'on'=>'update'),
			array('active, author_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			array('link', 'length', 'max'=>100),
			array('category_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, content, active, date, announcement, link, author_id, category_id', 'safe', 'on'=>'search'),
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
            'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
            'category'=>array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'content' => 'Содержание',
			'active' => 'Активно',
			'date' => 'Дата',
			'announcement' => 'Анонс',
			'link' => 'SEO URL',
			'author_id' => 'Автор',
			'category_id' => 'Категория',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('announcement',$this->announcement,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('category_id',$this->category_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>'10',
            ),
        ));
	}

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->date = new CDbExpression('NOW()');
            $this->author_id = Yii::app()->user->id;
        }

        return parent::beforeSave();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Services the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
