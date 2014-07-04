<?php

class NewBusinessController extends Controller
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
			$this->pageTitle = "Lĩnh vực kinh doanh - ". $this->arrSystem->title;
		
		// Linh vuc kinh doanh
		$criteria = new CDBCriteria();
		$criteria->addCondition("category_news_id = 1");
		$criteria->limit = 3;
		$arrNew = News::model()->findAll($criteria);
		
		$this->render("index", array(
			'arrNew' => $arrNew,
		));

	}
}