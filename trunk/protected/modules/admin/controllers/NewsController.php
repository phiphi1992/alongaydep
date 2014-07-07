<?php

class NewsController extends Controller
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
		$model = new News('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['News']))
		{	$model->attributes=$_GET['News'];
			$model->sub_category_id =  $_GET['News']['sub_category_id'];
		}
		
		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate($id = null)
	{
		$model = new News; 
		
		$flag = 0;
		if(!empty($_POST['News'])){
		
			$image_old = $model->attributes['image'];
			
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$model->attributes = $_POST['News'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				
				$model->attributes = $_POST['News'];
				$model->image = $image_old;
			}
			$model->category_news_id = $_POST['News']['category_news_id'];
			$model->sub_category_id =  $_POST['sub_category'];
			$model->created = time();
			$model->alias = alias($_POST['News']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				
				$this->redirect(PIUrl::createUrl('/admin/news/'));
			}
		}
		$dataCategories = CategoriesNews::model()->getDataCategories();
		$this->render('create', array('model'=>$model, 'dataCategories'=>$dataCategories));
	}
	
	public function actionGetCate($id = null){
		$criteria = new CDBCriteria();
		$criteria->addCondition('category_new_id = '.$id);
		$criteria->select = 'id, name';
		$arr_cate = SubCategoryNews::model()->findAll($criteria);
		$arrData = array();
		foreach($arr_cate as $cate){
			$arrData[] = array('id'=>$cate->id, 'name'=>$cate->name);
		}
		echo json_encode($arrData);
	}
	
	public function actionUpdate($id = null)
	{
		$model = News::model()->findByPk($id);
		$flag  = 0;
		$image_old = $model->attributes['image'];
		if(!empty($_POST['News'])){
		
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['News'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['News'];
				$model->image = $image_old;
			}
			
			$model->category_news_id = $_POST['News']['category_news_id'];
			$model->sub_category_id =  $_POST['sub_category'];
			$model->created = time();
			$model->alias = alias($_POST['News']['name']);
			
			if($model->category_news_id == 1){
				if($model->save()){
					Yii::app()->user->setFlash('success', translate('Sửa thành công.'));

					if($flag == 1)
					{
						$image->saveAs($images_path);	
					}
					
					$this->redirect(PIUrl::createUrl('/admin/news/',array("id"=>1,"type"=>1)));
				}
			}else{
				if($model->save()){
					Yii::app()->user->setFlash('success', translate('Sửa thành công.'));

					if($flag == 1)
					{
						$image->saveAs($images_path);	
					}
					
					$this->redirect(PIUrl::createUrl('/admin/news/',array("type"=>2)));
				}
			}
		}
		$dataCategories = CategoriesNews::model()->getDataCategories();
		$dataSubCate = SubCategoryNews::model()->getDataCategories($model->category_news_id);
		
		$this->render('update', array('model'=>$model, 
				'dataCategories'=>$dataCategories,
				'dataSubCate' => $dataSubCate,
			));
	}
	
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
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
		$this->redirect(PIUrl::createUrl('/admin/news/1/'));
	}
}