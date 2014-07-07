<?php

class ProvincesController extends Controller
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
		$model = new Provinces('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Provinces']))
		{	$model->attributes=$_GET['Provinces'];
		}
		
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Provinces; 
		
		$flag = 0;
		if(!empty($_POST['Provinces'])){
	
			$model->attributes = $_POST['Provinces'];
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm  thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/provinces/'));
			}
		}

		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Provinces::model()->findByPk($id);; 
		
		$flag = 0;
		if(!empty($_POST['Provinces'])){
	
			$model->attributes = $_POST['Provinces'];
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/provinces/'));
			}
		}

		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Provinces::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		if(!empty($model)){
			$ward = new Wards();
			$cri = new CDBCriteria();
			$cri->addCondition("province_id = ".$id);
			$ward->deleteAll($cri);
		}
		$model->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_Provinces['returnUrl']) ? $_Provinces['returnUrl'] : array('index'));
	}
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			
			$model = $this->loadModel($arrIdNew[$i]);
			if(!empty($model)){
				$ward = new Wards();
				$cri = new CDBCriteria();
				$cri->addCondition("province_id = ".$arrIdNew[$i]);
				$ward->deleteAll($cri);
			}
			$model->delete();
			
		}
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		$this->redirect(isset($_Provinces['returnUrl']) ? $_Provinces['returnUrl'] : array('index'));
	}
}