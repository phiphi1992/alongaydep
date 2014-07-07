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
	
	public $db_host = 'localhost';
	public $db_user = 'root';
	public $db_pass = '';
	public $db_data = 'alongaydep'; 

	
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
	
	// function thống kê số lượt truy cập
	public function counter(){
	
		// connect to db
		$con = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_data);
		$time_now = time();
		$time_out = 30;
		$ip = $_SERVER['SERVER_ADDR'];
		$result = mysqli_query($con, "SELECT `ip` FROM `user_online` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip` = '$ip'");
		if (!mysqli_num_rows($result))
			mysqli_query($con, "INSERT INTO `user_online` VALUES ('$ip', NOW())");
		
		// đếm số người đang online
		$result = mysqli_query($con, "SELECT `ip` FROM `user_online` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now");
		$online = mysqli_num_rows($result);
		
		// số lượt truy cập theo ngày
		$result = mysqli_query($con, "SELECT `ip` FROM `user_online` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 1) . " AND YEAR(`last_visit`) = " . date('Y'));
		$day = mysqli_num_rows($result);
		
		// số lượt truy cập trong tuần
		$resutl = mysqli_query($con, "SELECT `ip` FROM `user_online` WHERE WEEKOFYEAR(`last_visit`) = " . date('W') . " AND YEAR(`last_visit`) = " . date('Y'));
		$week = mysqli_num_rows($resutl);
		
		// số lượt truy cập trong tháng
		$result = mysqli_query($con, "SELECT `ip` FROM `user_online` WHERE MONTH(`last_visit`) = " . date('n') . " AND YEAR(`last_visit`) = " . date('Y'));
		$month = mysqli_num_rows($result);
		
		// đếm số người truy cập trong năm
		$result = mysqli_query($con, "SELECT `ip` FROM `user_online` WHERE YEAR(`last_visit`) = " . date('Y'));
		$year = mysqli_num_rows($result);
		
		$arrData = array(
			'online' => $online,
			'day' => $day,
			'week' => $week,
			'month' => $month,
			'year' => $year,
		);
		return $arrData;
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