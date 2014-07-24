<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $parent_cat_id
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 */
class Category extends CActiveRecord
{
    public $active;
    public $indent = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max'=>128),
			array('description', 'length', 'max'=>256),
			array('parent_cat_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, parent_cat_id, active', 'safe', 'on'=>'search'),
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
            'parent' => array(self::BELONGS_TO, 'Category', 'parent_cat_id'),
            'children' => array(self::HAS_MANY, 'Category', 'parent_cat_id',
                'order'=>'children.id ASC'
            ),
			'posts' => array(self::HAS_MANY, 'Post', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'description' => 'Описание',
			'parent_cat_id' => 'Родительская категория',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('parent_cat_id',$this->parent_cat_id,true);
        $criteria->compare('active',$this->active,true);

		return new CatTreeActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'childRelation'=>'children',
		));
	}

    /**
     * @param $level
     * @return string
     */
    private static function _makeNbsp($level)
    {
        $str = '';
        for ($i = 0; $i < $level; $i++)
        {
            $str .= ' - ';
        }

        return $str;
    }

    private static $_items = array();

    /**
     * @param $parentID
     * @param $lvl
     */
    public static function makeTree($parentID, $lvl = 0)
    {

        $menus = self::model()->findAll(
            array(
                'condition'=>'parent_cat_id=:parentID',
                'params'=>array(':parentID'=>$parentID),
            )
        );

        foreach ($menus as $menu) {
            $id = $menu->id;
            $lvl++;
            self::$_items[$menu->id] = self::_makeNbsp($lvl) . $menu->name;
            self::makeTree($id, $lvl);
            $lvl--;
        }

        return self::$_items;
    }

    public function dataRow($data, $row) {
        return  '|';
    }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
