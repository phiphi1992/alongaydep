<?php

class SystemController extends Controller
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
		
		$model = System::model()->find();
		if(empty($model))
			$model = new System;
		$flag = 0;
		if(!empty($_POST['System'])){
			$logo_old = $model->attributes['logo'];
			if(!empty(CUploadedFile::getInstance($model,'logo')->name))
			{
				$logo_old = $model->attributes['logo'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$logo_old);
				if(file_exists($path) && !empty($logo_old)) unlink($path);
				$model->attributes = $_POST['System'];
				$model->logo = CUploadedFile::getInstance($model,'logo');
				$image = $model->logo;
				$imageType = explode('.',$model->logo->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->logo = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->logo = $logo_old;
				$model->attributes = $_POST['System'];
			}			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/system'));
			}
		}
		$this->render('index',array('model'=>$model));
	}
	
}