<?php

class ImageController extends Controller
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

	public function actionIndex($id = null)
	{
		
		if(!empty($this->arrSystem))
			$this->pageTitle = "Hình ảnh - ". $this->arrSystem->title;
		
		$criteria = new CDBCriteria;
		$title = "";
		if($id == null){
			$criteria->addCondition("is_product = 1");
			$title = "Hình ảnh hoạt động";
		}
		else{
			if($id == 2){
				$criteria->addCondition("is_product = 2");
				$title = "Sản phẩm mới";
			}
			else	throw new CHttpException(404, 'Không tìm thấy trang!.');
		}
		
		$countItem =  Slides::model()->count($criteria);    
		$pages = new CPagination($countItem);
		$pages->setPageSize(12);
		$pages->applyLimit($criteria);
		$arrNew = Slides::model()->findAll($criteria);
		
		$arrImage = Slides::model()->findALl($criteria);

		$this->render("index", array(
			'arrImage' => $arrImage,
			'item_count'=>$countItem,
			'page_size'=>12,
			'pages'=>$pages,
			'title' => $title,
		));
	}
}