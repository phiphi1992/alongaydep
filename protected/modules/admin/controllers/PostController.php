<?php

class PostController extends Controller
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
		$model = new Post('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Post; 
		
		$flag = 0;
		if(!empty($_POST['Post'])){
		
			$image_old = $model->attributes['image'];
			
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$model->attributes = $_POST['Post'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				
				$model->attributes = $_POST['Post'];
				$model->image = $image_old;
			}
	
			$model->created = time();
			$model->alias = alias($_POST['Post']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm album thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				$this->redirect(PIUrl::createUrl('/admin/post/'));
			}
		}

		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Post::model()->findByPk($id);
		$flag  = 0;
		$image_old = $model->attributes['image'];
		if(!empty($_POST['Post'])){
		
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Post'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['Post'];
				$model->image = $image_old;
			}
			
			$model->updated = time();
			$model->alias = alias($_POST['Post']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Sửa album thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				$this->redirect(PIUrl::createUrl('/admin/Post/'));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Post::model()->findByPk($id);
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
		Yii::app()->user->setFlash('success', translate('Xóa album thành công.'));
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}