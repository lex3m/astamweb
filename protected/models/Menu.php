<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property string $id
 * @property string $title
 * @property string $link
 * @property integer $active
 * @property string $parent_menu_id
 * @property integer $position
 */
class Menu extends CActiveRecord
{
    const MAX_LEVEL = 3;
    public $maxPositionInBranch;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, active', 'required'),
			array('active, position', 'numerical', 'integerOnly'=>true),
			array('title, link', 'length', 'max'=>255),
			array('parent_menu_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, link, active, parent_menu_id, position', 'safe', 'on'=>'search'),
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
            'activeChilds' => array(self::HAS_MANY, 'Menu', 'parent_menu_id', 'condition'=>'active = 1'),
            'childs' => array(self::HAS_MANY, 'Menu', 'parent_menu_id'),
            'parent' => array(self::BELONGS_TO, 'Menu', 'parent_menu_id'),
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
			'link' => 'Ссылка',
			'active' => 'Активно',
			'parent_menu_id' => 'Родительское меню',
			'position' => 'Order',
		);
	}

    //Построение дерева меню
    public static function buildTreePages($parentId, $depth = 0){
        $sub = self::model();
        $sub = $sub->findAll(array(
            'condition'=>"parent_menu_id=:parent_menu_id",
            'params'=>array(
                'parent_menu_id' => $parentId,
            ),
            'order'=>'t.position',
        ));
        if(!count($sub)) return array();

        $treePages=array();
        foreach ($sub as $v) {
            $children=self::buildTreePages($v->id, $depth + 1);
            $treePages[]=array(
                'id'=>$v->id,
                'attr'=>array(
                    'pid'=>$v->id,
                    'class'=>$v->active?'jstree-checked':'',
                    'level' => $depth + 1,
                ),
                'data'=>CHtml::decode($v->title),
                'state'=>count($children)?'open':null,
                'children'=>$children,
            );
        }
        return $treePages;
    }

    /**
     * Save a right order for menu items
     */
    public function normalize(){
        $pages=self::model()->findAll(array(
            'condition'=>'parent_menu_id=:parentId AND position>=:position AND id!=:id',
            'params'=>array(
                'id'=>$this->id,
                'parentId'=>$this->parent_menu_id,
                'position'=>$this->position,
            ),
        ));
        $num=$this->position;
        foreach($pages as $page){
            if($num==$page->position){
                $page->position++;
                $page->update();
            }else
                break;
            ++$num;
        }
    }

    /**
     * Concate all errors to one string
     * @return string
     */
    public function plainErrors(){
        $item_errors = $this->getErrors();
        $errors=array();
        foreach($item_errors as $item_error){
            $errors[]=join(', ',$item_error);
        }
        return join("<br />",$errors);
    }

    public static function create($attributes){
        $item = new Menu;

        $item->title = array_key_exists('title', $attributes) ? $attributes['title'] : null;
        $item->parent_menu_id = array_key_exists('parent_menu_id', $attributes) ? $attributes['parent_menu_id'] : null;
        $item->position = array_key_exists('position', $attributes) ? $attributes['position'] : null;
        $item->active = 0;

        if(!$item->save())
            throw new CHttpException(400, $item->plainErrors());

        $item->normalize();

        return $item;
    }

    public function rename($newTitle)
    {
        $this->title = CHtml::encode($newTitle);
        if(!$this->update())
            throw new CHttpException(400,$this->plainErrors());
    }

    public function setVisible($visible) {
        $this->active = (int)$visible;
        if(!$this->update())
            throw new CHttpException(400,$this->plainErrors());
        $subPages = self::model()->findAll("parent_menu_id=".$this->id);
        foreach($subPages as $subPage)
            $subPage->setVisible($visible);
    }

    public function deleteBranch(){
        if(!$this->delete())
            throw new CHttpException(400,$this->plainErrors());

        $subPages = self::model()->findAll("parent_menu_id=".$this->id);
        foreach($subPages as $subPage)
            $subPage->deleteBranch();
    }

    public function move($ref, $pos)
    {
        $refPage = self::model()->findByPk($ref);
        if($refPage===null && !($ref==0 && $pos=='last'))
            throw new CHttpException(400,$this->plainErrors());

        switch($pos){
			case 'before':
				$this->parent_menu_id=$refPage->parent_menu_id;
				$this->position=$refPage->position;
				break;
			case 'after':
				$this->parent_menu_id=$refPage->parent_menu_id;
				$this->position=$refPage->position+1;
				break;
			case 'last':
				$this->parent_menu_id=$ref==0?0:$refPage->id;
				$this->position=self::model()->find(array(
                        'select'=>'MAX(position) as maxPositionInBranch',
                        'condition'=>'parent_menu_id=:parent_menu_id',
                        'params'=>array(
                            'parent_menu_id'=>$this->parent_menu_id
                        )
                    ))->maxPositionInBranch+1;
				break;
			default:
				throw new CHttpException(400, 'Команда не найдена');
		}
		if(!$this->update())
            throw new CHttpException(400,$this->plainErrors());

		$this->normalize();
    }

    public static function getMenuItems($parentId, $depth = 0){
        # не выводим более 3 уровней
        if ($depth > self::MAX_LEVEL) {
            return array();
        }

        $pages = self::model();
        $pages = $pages->findAll(array(
            'condition'=>"parent_menu_id = :parentId AND active = :active",
            'params'=>array(
                'parentId' => $parentId,
                'active' => 1,
            ),
            'order'=>'t.position',
        ));

        if(!count($pages)) return array();

        $menu = array();
        foreach ($pages as $k => $v) {
            $menu[$k] = array();
            $children = self::getMenuItems($v->id, $depth + 1);

            $menu[$k]['label'] = $v->title;
            $menu[$k]['url'] = array($v->link);

//            $menu[$k]['linkOptions'] = array('target' => '_blank');

            if ($children)
                $menu[$k]['items'] = $children;
        }

        return $menu;
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
                'condition'=>'parent_menu_id=:parentID',
                'params'=>array(':parentID'=>$parentID),
                'order'=>'t.position',
            )
        );

        foreach ($menus as $menu) {
            $id = $menu->id;
            $lvl++;
            self::$_items[$menu->id] = self::_makeNbsp($lvl) . $menu->title;
            self::makeTree($id, $lvl);
            $lvl--;
        }

        return self::$_items;
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('parent_menu_id',$this->parent_menu_id,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
