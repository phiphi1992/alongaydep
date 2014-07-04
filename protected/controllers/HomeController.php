<?php

class HomeController extends Controller
{
	/*public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}*/
	public function allowedActions()
	{
		return '*';
	}

	public function actionIndex()
	{
		if(!empty($this->arrSystem))
			$this->pageTitle = "Trang chủ - ". $this->arrSystem->title;
		
		// Hinh anh trinh dien
		$criteria = new CDBCriteria();
		$criteria->addCondition("is_product = 3");
		$arrImage = Slides::model()->findAll($criteria);
		
		// Linh vuc kinh doanh
		$criteria = new CDBCriteria();
		$criteria->addCondition("category_news_id = 1");
		$criteria->limit = 3;
		$arrNew = News::model()->findAll($criteria);
		
		// tin tuc noi bat
		$criteria = new CDBCriteria();
		$criteria->addCondition("category_news_id != 1");
		$criteria->order = 'id DESC';
		$criteria->limit = 3;
		$arrNewSpecial = News::model()->findAll($criteria);
		
		// hinh anh noi bat
		$criteria = new CDBCriteria();
		$criteria->addCondition("is_product = 1");
		$criteria->order = 'id DESC';
		$criteria->limit = 8;
		$arrImageSpecial = Slides::model()->findAll($criteria);
		
		$this->render("index", array(
			'arrImage' => $arrImage,
			'arrNew' => $arrNew,
			'arrNewSpecial' => $arrNewSpecial,
			'arrImageSpecial' => $arrImageSpecial,
		));
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->render('error', $error);
			}
		}
	}
}