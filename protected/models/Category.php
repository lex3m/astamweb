<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $parent_cat_id
 * @property integer $active
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 */
class Category extends CActiveRecord
{

    public $indent = 0;
    public $workWithItemsSelected;
    public $maxPosition;

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
			array('name', 'required'),
			array('active, position', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('description', 'length', 'max'=>255),
			array('parent_cat_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, parent_cat_id, active, position', 'safe', 'on'=>'search'),
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
                'order'=>'children.position ASC'
            ),
            'posts' => array(self::HAS_MANY, 'Post', 'category_id'),
            'services' => array(self::HAS_MANY, 'Services', 'category_id'),
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
            'active' => 'Активно',
            'position' => 'Позиция',
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
        $criteria->compare('name',$this->name,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('parent_cat_id',$this->parent_cat_id,true);
        $criteria->compare('active',$this->active,true);
        $criteria->order = 't.position';

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
    public static function makeTree($id, $parentID, $lvl = 0)
    {

        $menus = self::model()->findAll(
            array(
                'condition'=>'parent_cat_id=:parentID AND id != :id',
                'params'=>array(':parentID'=>$parentID, ':id'=>$id),
                'order' => 't.position',
            )
        );

        foreach ($menus as $menu) {
            $id = $menu->id;
            $lvl++;
            self::$_items[$menu->id] = self::_makeNbsp($lvl) . $menu->name;
            self::makeTree($id, $id, $lvl);
            $lvl--;
        }

        return self::$_items;
    }

    /**
     * Recursive updates all categories and subcategories
     * @param $flag
     * @throws CHttpException
     */
    public function updateBranch($flag) {
        $active = (int)$flag;
        $this->active = $active;
        if (!$this->update())
            throw new CHttpException(400,$this->getErrors());

        $subCategories = self::model()->findAll('parent_cat_id='.$this->id);
        foreach ($subCategories as $category)
            $category->updateBranch($flag);
    }

    /**
     * Recursive delete a set of categories
     * @throws CHttpException
     */
    public function deleteBranch()
    {
        if (!$this->delete())
            throw new CHttpException(400, $this->getErrors());

        $subCategories = self::model()->findAll('parent_cat_id='.$this->id);
        foreach ($subCategories as $category)
            $category->delteBranch();

    }

    /**
     * Save a right order for menu items
     */
    public function normalize(){
        $categories =self::model()->findAll(array(
            'condition'=>'parent_cat_id=:parentId AND position>=:position AND id!=:id',
            'params'=>array(
                'id'=>$this->id,
                'parentId'=>$this->parent_cat_id,
                'position'=>$this->position,
            ),
        ));
        $num=$this->position;
        foreach($categories as $cat){
            if($num==$cat->position){
                $cat->position++;
                $cat->update();
            }else
                break;
            ++$num;
        }
    }

    /**
     * Find next record
     * @return CActiveRecord
     * @throws CHttpException
     */
    public function nextRecord()
    {
        $category =self::model()->find(array(
            'condition'=>'parent_cat_id=:parentId AND id!=:id AND position > :position',
            'params'=>array(
                'id'=>$this->id,
                'parentId'=>$this->parent_cat_id,
                'position'=>$this->position,
            ),
            'order'=>'t.id'
        ));
        if ($category)
            return $category;
        else
            throw new CHttpException(404, 'Запись не найдена');
    }

    /**
     * Find previous record
     * @return CActiveRecord
     * @throws CHttpException
     */
    public function prevRecord()
    {
        $category =self::model()->find(array(
            'condition'=>'parent_cat_id=:parentId AND id!=:id AND position < :position',
            'params'=>array(
                'id'=>$this->id,
                'parentId'=>$this->parent_cat_id,
                'position'=>$this->position,
            ),
            'order'=>'t.id DESC'
        ));
        if ($category)
            return $category;
        else
            throw new CHttpException(404, 'Запись не найдена');
    }

    public static function getMaxPosition($catID)
    {
        $item = self::model()->find(array(
            'select'=>'MAX(position) as maxPosition',
            'condition'=>'parent_cat_id=:parent_cat_id',
            'params'=>array(
                'parent_cat_id'=>$catID
            )
        ));

        return $item->maxPosition;
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
