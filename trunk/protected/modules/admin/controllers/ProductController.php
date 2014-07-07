<?php

class ProductController extends Controller
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
		$model = new Product('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate($id = null)
	{
		$model = new Product; 
		
		$flag = 0;
		if(!empty($_POST['Product'])){
		
			$image_old = $model->attributes['image'];
			
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$model->attributes = $_POST['Product'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				
				$model->attributes = $_POST['Product'];
				$model->image = $image_old;
			}
			
			$model->created = time();
			$model->alias = alias($_POST['Product']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm sản phẩm thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				// Them hinh anh 
				$arrImage = CUploadedFile::getInstancesByName('images');
				foreach($arrImage as $image){
					$modelImage = new ProductImage;
					$modelImage->product_id	 = $model->id;
					$nameImage = explode(".", $image->name);
					$type = end($nameImage);
					$modelImage->image = md5(uniqid()).'.'.$type;
					$modelImage->created = time();
					$path = Yii::getPathOfAlias('webroot').'/upload/images/'.$modelImage->image;
					$image->saveAs($path);
					$modelImage->save();
				}
				
				$this->redirect(PIUrl::createUrl('/admin/Product/'));
			}
		}
		$dataCategories = ProductCategory::model()->getDataCategories();
		$this->render('create', array('model'=>$model, 'dataCategories'=>$dataCategories));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Product::model()->findByPk($id);
		$flag  = 0;
		$image_old = $model->attributes['image'];
		if(!empty($_POST['Product'])){
		
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Product'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['Product'];
				$model->image = $image_old;
			}
			
			$model->updated = time();
			$model->alias = alias($_POST['Product']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Sửa sản phẩm thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				// Them hinh anh 
				$arrImage = CUploadedFile::getInstancesByName('images');
				foreach($arrImage as $image){
					$modelImage = new ProductImage;
					$modelImage->product_id	 = $model->id;
					$nameImage = explode(".", $image->name);
					$type = end($nameImage);
					$modelImage->image = md5(uniqid()).'.'.$type;
					$modelImage->created = time();
					$path = Yii::getPathOfAlias('webroot').'/upload/images/'.$modelImage->image;
					$image->saveAs($path);
					$modelImage->save();
				}
				
				$this->redirect(PIUrl::createUrl('/admin/Product/'));
			}
		}
		$dataCategories = ProductCategory::model()->getDataCategories();
		$criteria  = new CDBCriteria;
		$criteria->addCondition("product_id = {$id}");
		$arrProductImage = ProductImage::model()->findAll($criteria);
		
		$this->render('update', array('model'=>$model, 
			'dataCategories'=>$dataCategories,
			'arrProductImage' => $arrProductImage,
		));
	}
	
	public function actionDeleteImage($id=null){
		$model = ProductImage::model()->findByPk($id);
		$path = realpath(Yii::app()->basePath.'/../upload/images/'.$model->image);
		if(file_exists($path) && !empty($image_old)) unlink($path);
		$model->delete();
		echo true;
	}
	
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
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
		
		if(!empty($model)){
			$criteria = new CDBCriteria();
			$criteria->addCondition("product_id = {$id}");
			$criteria->select = "id";
			$arrImage = ProductImage::model()->findALl($criteria);
			foreach($arrImage as $ProductImage){
			
				$modelImage = ProductImage::model()->find($ProductImage->id);
				$path = "/../upload/images/";
				$name = $modelImage->image;
				$this->unlink($path, $name);
				$modelImage->delete();
			}
		}
		
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
			
			if(!empty($model)){
				$criteria = new CDBCriteria();
				$criteria->addCondition("product_id = {$arrIdNew[$i]}");
				$criteria->select = "id";
				$arrImage = ProductImage::model()->findALl($criteria);
				foreach($arrImage as $ProductImage){
					$modelImage = ProductImage::model()->find($ProductImage->id);
					$path = "/../upload/images/";
					$name = $modelImage->image;
					$this->unlink($path, $name);
					$modelImage->delete();
				}
			}
			
			$model->delete();
			
		}
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}