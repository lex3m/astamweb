<?php
/**
 * BackEndController is the controller for administrative part of site
 * All BackEnd controllers classes for this application should extend from this class.
 */
class BackEndController extends BaseController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /*
        Фильтры
    */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /*
        Права доступа
    */
    public function accessRules()
    {
        return array(
            // даем доступ только админам и модераторам
            array(
                'allow',
                'roles'=>array(User::ROLE_ADMIN, User::ROLE_MODER),
            ),
            // всем остальным разрешаем посмотреть только на страницу авторизации
            array(
                'allow',
                'actions'=>array('login', 'error'),
                'users'=>array('?'),
            ),
            // запрещаем все остальное
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }
}