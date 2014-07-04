<?php

class SlidesController extends Controller
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
	
	public function actionIndex($is_product = 1)
	{
		if(!empty($_POST)){
			$is_new_product = $is_product;
			$images =  CUploadedFile::getInstancesByName('images');
			if (isset($images) && count($images) > 0) {
				// go through each uploaded image
				foreach ($images as $image => $pic) {
					$model = new Slides; 
					$imageType = explode('.',$pic->name);
					$imageType = $imageType[count($imageType)-1];
					$imageName = md5(uniqid()).'.'.$imageType;
					if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName)) 
					{											
						$model->image = $imageName;
						$model->name = $pic->name;
						$model->is_product = $is_new_product;
						
						$model->save();

								Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
					
					}
						// handle the errors here, if you want
						
				}
			}	
			PIUrl::createUrl('/admin/slides/index', array('is_product'=> $is_product));
		}
		
		$criteria=new CDbCriteria();
		$criteria->addCondition("is_product= {$is_product}");
		$criteria->order = 'id DESC';
		$count=Slides::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->pageSize=6;
		$pages->applyLimit($criteria);
		$model=Slides::model()->findAll($criteria);
		$this->render('index',compact('model','pages'));
	}
	
	public function loadModel($id)
	{
		$model=Slides::model()->findByPk($id);
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
	
	public function actionDelete($id, $is_product)
	{
		$model = $this->loadModel($id);
		$path = "/../upload/images/";
		$name = $model->image;
		$this->unlink($path, $name);
		$model->delete();
		
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		$this->redirect(PIUrl::createUrl('/admin/slides/index', array('is_product'=> $is_product)));
	}
}