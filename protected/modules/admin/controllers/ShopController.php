<?php

class ShopController extends Controller
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
		$model = new Shop('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Shop']))
			$model->attributes=$_GET['Shop'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Shop; 
		$flag = 0;
		if(!empty($_POST['Shop'])){
		
			$image_old = $model->attributes['logo'];
			
			if(!empty(CUploadedFile::getInstance($model,'logo')->name))
			{
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Shop'];
				$model->logo = CUploadedFile::getInstance($model,'logo');
				$logo = $model->logo;
				$imageType = explode('.',$model->logo->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->logo = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['Shop'];
				$model->logo = $image_old;
			}
			$model->created = time();
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));

				if($flag == 1)
				{
					$logo->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/shop/index'));
			}
		}
		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Shop::model()->findByPk($id);
		if($model == null)
			throw new CHttpException(404,'dd');		
		$flag = 0;
		if(!empty($_POST['Shop'])){
		
			$image_old = $model->attributes['logo'];
			
			if(!empty(CUploadedFile::getInstance($model,'logo')->name))
			{
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Shop'];
				$model->logo = CUploadedFile::getInstance($model,'logo');
				$logo = $model->logo;
				$imageType = explode('.',$model->logo->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->logo = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['Shop'];
				$model->logo = $image_old;
			}
			$model->created = time();
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));

				if($flag == 1)
				{
					$logo->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/shop/index'));
			}
		}
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Shop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			$this->loadModel($arrIdNew[$i])->delete();
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}