<?php

class ImagesController extends Controller
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
		if(!empty($_POST)){
			$images =  CUploadedFile::getInstancesByName('images');
			
			if (isset($images) && count($images) > 0) {
				// go through each uploaded image
				foreach ($images as $image => $pic) {
	
					$model = new Images; 
					$imageType = explode('.',$pic->name);
					$imageType = $imageType[count($imageType)-1];
					$imageName = md5(uniqid()).'.'.$imageType;
					
					if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName)) 
					{											
						$model->image = $imageName;
						$model->name = $pic->name;
						$model->created = time();
						$model->save();
							
							Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
					}
						// handle the errors here, if you want
						
				}
			}	
			$this->redirect(PIUrl::createUrl('/admin/images/index/'));	
		}
		
		$criteria=new CDbCriteria();
		$criteria->order = 'id DESC';
		$count=Images::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->pageSize=18;
		$pages->applyLimit($criteria);
		$model=Images::model()->findAll($criteria);
		$this->render('index',compact('model','pages'));
	}
	
	public function loadModel($id)
	{
		$model=Images::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionDelete($id)
	{
		$model = Images::model()->findByPk($id);
		$name = $model->attributes['image'];
		$this->loadModel($id)->delete();
		unlink(Yii::app()->basePath.'/../upload/images/'.$name);
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}