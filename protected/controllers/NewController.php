<?php

class NewController extends Controller
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

	public function actionIndex($alias = null, $name = null)
	{
		if(!empty($this->arrSystem))
			$this->pageTitle = "Tin tức - ". $this->arrSystem->title;
		
		$arrNew = null;
		$criteriaNew = new CDBCriteria;
		$title = "Tin tức";
		$criteriaNew->condition = "";
		if($alias != null){
			// lay id cua danh muc tin tuc
			$criteria = new CDBCriteria();
			$criteria->addCondition("alias  = :alias");
			$criteria->params= array(":alias" => $alias);
			$id_cate = CategoriesNews::model()->find($criteria);
			if(empty($id_cate)){
				throw new CHttpException(404, 'Không tìm thấy trang!.');
			}else{
				$title = $id_cate->name;
				$id_cate = $id_cate->id;
				$criteriaNew->condition = "category_news_id = {$id_cate}";
			}
		}else
			$criteriaNew->condition = "category_news_id != 1";
		if($name != null)
		{	
			$criteriaNew->condition .= " and name LIKE :name "; 
			$criteriaNew->params = array(':name' => '%'.$name.'%');
		}
			
		$countItem =  News::model()->count($criteriaNew);    
		$pages = new CPagination($countItem);
		$pages->setPageSize(6);
		$pages->applyLimit($criteriaNew);
		$arrNew = News::model()->findAll($criteriaNew);

		$this->render("index", array(
			'arrNew' => $arrNew,
			'item_count'=>$countItem,
			'page_size'=>6,
			'pages'=>$pages,
			'title' =>$title,
		));

	}
	
	public function actionNewDetail($alias = null){
	
		if(!empty($this->arrSystem))
			$this->pageTitle = "Tin tức - ". $this->arrSystem->title;
		
		$new = $newRelated = null;
		$cateInfo = null;
		
		if(!empty($alias)){
			// lay tin tuc theo alias
			$criteria = new CDBCriteria;
			$criteria->addCondition("alias = :alias");
			$criteria->params = array(":alias" => $alias);
			$new = News::model()->find($criteria);
			if(empty($new))
				throw new CHttpException(404, 'Không tìm thấy trang!.');
			else{
				// lay ten cua danh muc
				$cateInfo = CategoriesNews::model()->findByPK($new->category_news_id);
				
				// lay cac tin lien quan 
				$criteria = new CDBCriteria;
				$criteria->addCondition("alias != :alias and category_news_id = {$new->category_news_id} ");
				$criteria->params = array(":alias" => $alias);
				$criteria->order = "id DESC";
				$criteria->limit = 5;
				$newRelated = News::model()->findAll($criteria);
			}
		}

		$this->render("newDetail", array(
			'newInfo' => $new,
			'newRelated' => $newRelated,
			'cateInfo' => $cateInfo,
		));
	}
}