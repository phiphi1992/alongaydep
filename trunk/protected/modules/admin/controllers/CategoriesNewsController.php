<?php

class CategoriesNewsController extends Controller
{
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations

		);
	}
	public function allowedActions()
	{
		//return 'error';
	}
	
	public function actionIndex()
	{
		$model = new CategoriesNews('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['CategoriesNews']))
			$model->attributes=$_GET['CategoriesNews'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new CategoriesNews;
		
		if(isset($_POST['CategoriesNews']))
		{
			$model->attributes=$_POST['CategoriesNews'];
			$model->created = time();
			$model->alias = alias($_POST['CategoriesNews']['name']);
			if(!empty($_POST['CategoriesNews']['parent_id'])){
				$model->parent_id = $_POST['CategoriesNews']['parent_id'];
			}else	$model->parent_id = 0;

			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/categoriesNews/index'));
			}
		}
		
		$arrCate = CategoriesNews:: model()->getDataCategories1();
		
		$this->render('create', array('model'=>$model, 'arrCate' => $arrCate));
	}
	
	public function actionUpdate($id = null)
	{
		$model = CategoriesNews::model()->findByPk($id);
		
		if(isset($_POST['CategoriesNews']))
		{
			
			$model->attributes=$_POST['CategoriesNews'];
			$model->created = time();
			if(!empty($_POST['CategoriesNews']['parent_id'])){
				$model->parent_id = $_POST['CategoriesNews']['parent_id'];
			}else	$model->parent_id = 0;
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/categoriesNews/index'));
			}
		}
		
		$arrCate = CategoriesNews:: model()->getDataCategories1();
		$this->render('update', array('model'=>$model, 'arrCate' => $arrCate));
	}
	
	public function loadModel($id)
	{
		$model=CategoriesNews::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function unlink($path, $name){
		
		$path = realpath(Yii::app()->basePath.$path.$name);
		if(file_exists($path) && !empty($name)) 
		{	
			unlink($path);
			return true;
			
		}else	return false;
	}
	
	public function actionDelete($id)
	{
		// Delete all news of category new
		$model = $this->loadModel($id);
		if(!empty($model)){
						
				// delete news
				$criteria = new CDBCriteria();
				if($model->parent_id == 0){
					$criCate = new CDBCriteria;
					$criCate->addCondition("parent_id = ".$model->id);
					$arrCate = CategoriesNews::model()->findAll($criCate);
					foreach($arrCate as $cate){
						$criteria->addCondition("category_news_id = {$cate->id}");
						$criteria->select = "id";
						$arrNewID = News::model()->findAll($criteria);
						if(!empty($arrNewID)){
							foreach($arrNewID as $newId){
								$modelNew = News::model()->find($newId->id);
								$path = "/../upload/images/";
								$name = $modelNew->image;
								$this->unlink($path, $name);
								$modelNew->delete();
							}
						}
					}
				}else{
					$criteria->addCondition("category_news_id = {$model->id}");
					$criteria->select = "id";
					$arrNewID = News::model()->findAll($criteria);
					if(!empty($arrNewID)){
						foreach($arrNewID as $newId){
							$modelNew = News::model()->find($newId->id);
							$path = "/../upload/images/";
							$name = $modelNew->image;
							$this->unlink($path, $name);
							$modelNew->delete();
						}
					}
				}
				
				// delete sub category
				$criteria = new CDBCriteria;
				$criteria->addCondition("parent_id = ".$id);	
				$cate = new CategoriesNews();
				$cate->deleteAll($criteria);
				
				$model->delete();
			}
		
		// Delete category new
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			
			// Delete all news of category new
			$model = CategoriesNews::model()->findByPk($arrIdNew[$i]);
			if(!empty($model)){
						
				// delete news
				$criteria = new CDBCriteria();
				if($model->parent_id == 0){
					$criCate = new CDBCriteria;
					$criCate->addCondition("parent_id = ".$model->id);
					$arrCate = CategoriesNews::model()->findAll($criCate);
					foreach($arrCate as $cate){
						$criteria->addCondition("category_news_id = {$cate->id}");
						$criteria->select = "id";
						$arrNewID = News::model()->findAll($criteria);
						if(!empty($arrNewID)){
							foreach($arrNewID as $newId){
								$modelNew = News::model()->find($newId->id);
								$path = "/../upload/images/";
								$name = $modelNew->image;
								$this->unlink($path, $name);
								$modelNew->delete();
							}
						}
					}
				}else{
					$criteria->addCondition("category_news_id = {$model->id}");
					$criteria->select = "id";
					$arrNewID = News::model()->findAll($criteria);
					if(!empty($arrNewID)){
						foreach($arrNewID as $newId){
							$modelNew = News::model()->find($newId->id);
							$path = "/../upload/images/";
							$name = $modelNew->image;
							$this->unlink($path, $name);
							$modelNew->delete();
						}
					}
				}
				
				// delete sub category
				$criteria = new CDBCriteria;
				$criteria->addCondition("parent_id = ".$arrIdNew[$i]);	
				$cate = new CategoriesNews();
				$cate->deleteAll($criteria);
				
				$model->delete();
			}
			
			// Delete category new
			
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
}