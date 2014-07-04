<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = 'main';
	//public $theme = 'admincp';
	public $image = '';
	public $renScript = true;
	
	public $arrSystem = array();
	public $arrInfo = array();
	public $arrCategoryNew = array();

	
	// use for popup schedule
	public $model = array(); 
 	
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
	
	public function init()
	{
		$this->arrSystem =  System::model()->find();
		
		$this->arrInfo =  Informations::model()->find();
		
		$criteria = new CDBCriteria();
		$criteria->addCondition("id!=1");
		$this->arrCategoryNew =  CategoriesNews::model()->findAll($criteria);
	}
	
	protected function afterRender($view, &$output) {
		if($this->renScript)
			Yii::app()->clientScript->registerCoreScript('jquery');
		//Yii::app()->dynamicRes->debug();
		//Yii::app()->dynamicRes->saveScheme();
		
	}
	
	/**
	* Phương thức dùng để cắt chuổi
	**/
	public function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
	
	/**
	* $data = array(
	*	'view'=>'mail',
	*	'server'=>'phihoang12b2@gmail.com',
	*	'data'=>array(
	*		'email'=>'phihoang12b2@gmail.com'
	*	)
	*);
	*$this->SendMail('hjkhjkh@jkhjk.kjljlk','asdad',$data,'layout');
	**/
}