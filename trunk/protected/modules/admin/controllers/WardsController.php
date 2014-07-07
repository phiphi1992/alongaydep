<?php

class WardsController extends Controller
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
		$model = new Wards('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Wards']))
		{	$model->attributes=$_GET['Wards'];
		}
		
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Wards; 
		
		$flag = 0;
		if(!empty($_POST['Wards'])){
	
			$model->attributes = $_POST['Wards'];
			$model->province_id = $_POST['Wards']['province_id'];
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm  thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/Wards/'));
			}
		}
		$dataProvinces = Provinces::model()->getData();
		$this->render('create', array('model'=>$model, 'dataProvinces'=>$dataProvinces));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Wards::model()->findByPk($id);; 
		
		if(!empty($_POST['Wards'])){
	
			$model->attributes = $_POST['Wards'];
			$model->province_id = $_POST['Wards']['province_id'];
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/Wards/'));
			}
		}
		$dataProvinces = Provinces::model()->getData();
		$this->render('update', array('model'=>$model, 'dataProvinces'=>$dataProvinces));
	}
	
	public function loadModel($id)
	{
		$model=Wards::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		
		$model->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_Wards['returnUrl']) ? $_Wards['returnUrl'] : array('index'));
	}
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			
			$model = $this->loadModel($arrIdNew[$i]);
			
			$model->delete();
		}
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		$this->redirect(isset($_Wards['returnUrl']) ? $_Wards['returnUrl'] : array('index'));
	}
}