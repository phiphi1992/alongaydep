<?php

class SubCategoryNewsController extends Controller
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
		$model = new SubCategoryNews('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['SubCategoryNews']))
			$model->attributes=$_GET['SubCategoryNews'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate()
	{
		$model = new SubCategoryNews;
		
		if(isset($_POST['SubCategoryNews']))
		{
			$model->attributes=$_POST['SubCategoryNews'];
			$model->created = time();
			$model->alias = alias($_POST['SubCategoryNews']['name']);
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Thêm danh mục thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/subCategoryNews/index'));
			}
		}
		
		$arrCate = CategoriesNews:: model()->getDataCategories();
		
		$this->render('create', array(
			'model'=>$model,
			'arrCate' => $arrCate,
		));
	}
	
	public function actionUpdate($id = null)
	{
		$model = SubCategoryNews::model()->findByPk($id);
		
		if(isset($_POST['SubCategoryNews']))
		{
			
			$model->attributes=$_POST['SubCategoryNews'];
			$model->created = time();
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/subCategoryNews/index'));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=SubCategoryNews::model()->findByPk($id);
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
			$criteria = new CDBCriteria();
			$criteria->addCondition("sub_category_id = {$id}");
			$criteria->select = "id";
			$arrNewID = News::model()->findALl($criteria);
			foreach($arrNewID as $newId){
			
				$modelNew = News::model()->find($newId->id);
				$path = "/../upload/images/";
				$name = $modelNew->image;
				$this->unlink($path, $name);
				$modelNew->delete();
			}
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
			$model = $this->loadModel($arrIdNew[$i]);
			
			if(!empty($model)){
				$criteria = new CDBCriteria();
				$criteria->addCondition("sub_category_id = {$arrIdNew[$i]}");
				$criteria->select = "id";
				$arrNewID = News::model()->findALl($criteria);
				foreach($arrNewID as $newId){
					$modelNew = News::model()->find($newId->id);
					$path = "/../upload/images/";
					$name = $modelNew->image;
					$this->unlink($path, $name);
					$modelNew->delete();
				}
			}
			
			// Delete category new
			$model->delete();
			
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
}