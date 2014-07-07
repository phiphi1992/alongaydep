<?php

class HotelController extends Controller
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
		
		$model = new Hotel('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Hotel']))
			$model->attributes=$_GET['Hotel'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate($id = null)
	{
		$model = new Hotel; 
		
		$flag = 0;
		if(!empty($_POST['Hotel'])){
		
			$image_old = $model->attributes['image'];
			
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$model->attributes = $_POST['Hotel'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				
				$model->attributes = $_POST['Hotel'];
				$model->image = $image_old;
			}
			
			$model->provinces = $_POST['provinces'];
			$model->wards = $_POST['wards'];
			$model->created = time();
			$model->alias = alias($_POST['Hotel']['name']);

			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm khách sạn thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				$this->redirect(PIUrl::createUrl('/admin/hotel/'));
			}
		}
		
		$criteria = new CDBCriteria;
		$criteria->select = "id, title";
		$provinces = Provinces::model()->findAll($criteria);
		
		$ward = new Wards;
		$wards = $ward->getWards(57);
		$typeHotel = Hotel::model()->getTypeHotel();

		$this->render('create', array(
			'model'=>$model,
			'provinces' => $provinces,
			'wards' => $wards,
			'typeHotel' => $typeHotel,
		));
	}
	
	public function actionGetWards($id){
		$ward = new Wards;
		$wards = $ward->getWards1($id);
		echo json_encode($wards);
	}
	
	public function actionUpdate($id = null)
	{
		$model = Hotel::model()->findByPk($id);
		$flag  = 0;
		$image_old = $model->attributes['image'];
		if(!empty($_POST['Hotel'])){
		
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Hotel'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['Hotel'];
				$model->image = $image_old;
			}
			
			$model->provinces = $_POST['provinces'];
			$model->wards = $_POST['wards'];
			$model->created = time();
			$model->alias = alias($_POST['Hotel']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhập khách sạn thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				$this->redirect(PIUrl::createUrl('/admin/hotel/'));
			}
		}
		$criteria = new CDBCriteria;
		$criteria->select = "id, title";
		$provinces = Provinces::model()->findAll($criteria);
		
		$ward = new Wards;
		$wards = $ward->getWards($model->provinces);
		$typeHotel = Hotel::model()->getTypeHotel();

		
		$this->render('update', array(
			'model'=>$model,
			'provinces' => $provinces,
			'wards' => $wards,
			'typeHotel' => $typeHotel,
		));
	}
	
	public function loadModel($id)
	{
		$model=Hotel::model()->findByPk($id);
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
		$model = $this->loadModel($id);
		$path = "/../upload/images/";
		$name = $model->image;
		$this->unlink($path, $name);
		$model->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			
			$model = $this->loadModel($arrIdNew[$i]);
			$path = "/../upload/images/";
			$name = $model->image;
			$this->unlink($path, $name);
			$model->delete();
			
		}
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	public function actionDeleteAll1($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			$model = $this->loadModel($arrIdNew[$i]);
			$path = "/../upload/images/";
			$name = $model->image;
			$this->unlink($path, $name);
			$model->delete();
		}
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		$this->redirect(PIUrl::createUrl('/admin/Hotel/1/'));
	}
}