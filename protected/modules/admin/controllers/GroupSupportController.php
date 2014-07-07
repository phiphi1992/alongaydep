<?php

class GroupSupportController extends Controller
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
		$model = new GroupSupport('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['GroupSupport']))
			$model->attributes=$_GET['GroupSupport'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new GroupSupport;
		
		if(isset($_POST['GroupSupport']))
		{
			$model->attributes=$_POST['GroupSupport'];
			$model->created = time();
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Thêm nhóm hỗ trợ thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/groupSupport/index'));
			}
		}
		
		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = GroupSupport::model()->findByPk($id);
		
		if(isset($_POST['GroupSupport']))
		{
			
			$model->attributes=$_POST['GroupSupport'];
			$model->created = time();
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập nhóm hổ trợ thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/groupSupport/index'));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=GroupSupport::model()->findByPk($id);
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
			$criteria->addCondition("group_support_id = {$id}");
			$criteria->select = "id";
			$arrSupport = Support::model()->findALl($criteria);
			foreach($arrSupport as $support){
				$model_support = Support::model()->find($support->id);
				$model_support->delete();
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
				$criteria->addCondition("group_support_id = {$arrIdNew[$i]}");
				$criteria->select = "id";
				$arrSupport = Support::model()->findALl($criteria);
				foreach($arrSupport as $support){
					$model_support = Support::model()->find($support->id);
					$model_support->delete();
				}
			}
			// Delete category new
			$model->delete();
			
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
}