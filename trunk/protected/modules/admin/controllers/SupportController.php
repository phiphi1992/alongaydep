<?php

class SupportController extends Controller
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
		$model = new Support('search');
		
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Support'])){
			$model->attributes=$_GET['Support'];
			$model->group_support_id = $_GET['Support']['group_support_id'];
		}
		
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Support;
		
		if(isset($_POST['Support']))
		{
			$model->attributes=$_POST['Support'];
			$model->created = time();
			$model->group_support_id = $_POST['Support']['group_support_id'];
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Thêm nhóm hỗ trợ thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/support/index'));
			}
		}
		$groupSupport = GroupSupport::model()->getGroupSupport();
		
		$this->render('create', array(
			'model'=>$model,
			'groupSupport' => $groupSupport,
		));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Support::model()->findByPk($id);
		
		if(isset($_POST['Support']))
		{

			$model->attributes=$_POST['Support'];
			$model->created = time();
			$model->group_support_id = $_POST['Support']['group_support_id'];
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập nhóm hổ trợ thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/support/index'));
			}
		}
		
		$groupSupport = GroupSupport::model()->getGroupSupport();
		
		$this->render('update', array(
			'model'=>$model,
			'groupSupport' => $groupSupport,
		));
	}
	
	public function loadModel($id)
	{
		$model=Support::model()->findByPk($id);
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
			$criteria->addCondition("category_news_id = {$id}");
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
				$criteria->addCondition("category_news_id = {$arrIdNew[$i]}");
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