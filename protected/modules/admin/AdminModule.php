<?php

class AdminModule extends CWebModule
{
	public $pageSize = 20;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
		Yii::app()->theme = "admincp";
	}

	public function beforeControllerAction($controller, $action)
	{
		$controller->layout = '//layouts/main';
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	public static function t($str='',$params=array(),$dic='user') {
		if (Yii::t("Kovo", $str)==$str)
		    return Yii::t("Kovo.".$dic, $str, $params);
        else
            return Yii::t("Kovo", $str, $params);
	}
}
