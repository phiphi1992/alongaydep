<?php

class DocumentsController extends Controller
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
		$model = new Documents('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Documents']))
			$model->attributes=$_GET['Documents'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Documents; 
		$flag1 = false;
		
		if(!empty($_POST)){
		
			for($i=0;$i<count($_POST['Documents']['category_document_id']);$i++){
				
				$model = new Documents; 
				$flag = false;
			
				$model->name = $_POST['Documents']['name'][$i];
				$model->category_document_id = $_POST['Documents']['category_document_id'][$i];
				$model->created = time();
				$model->type_document = 1;

				if($_FILES['Documents']['error']['filename'][$i] == 0){
					$tmp_name = $_FILES['Documents']['tmp_name']['filename'][$i];
					$model->size = $_FILES['Documents']['size']['filename'][$i];
					$filename = $_FILES['Documents']['name']['filename'][$i];
					$filename = explode(".", $filename);
					$model->filename = $filename[count($filename)-2].".".end($filename);
					$model->type = end($filename);
					$filenameMd5 = md5(uniqid()).'.'.$model->type;
					$model->md5name = $filenameMd5;
					$filenames_path = Yii::getPathOfAlias('webroot').'/upload/documents/'.$filenameMd5;
					$flag = true;
				}
				
				if($flag == true){
					if($model->save()){
						
						move_uploaded_file($tmp_name, $filenames_path);
						$flag1 = true;
					}
				}
			}
			
			if($flag1 == true){
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/documents/index'));
			}else{
				Yii::app()->user->setFlash('error', translate('Thêm không thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/documents/create'));
			}
		}
		
		$dataCategories = categoriesDocuments::model()->getCategoriesDocument();
		$this->render('create', array('model'=>$model, 'dataCategory'=>$dataCategories));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Documents::model()->findByPk($id);
		$flag  = 0;
		if(!empty($_POST['Documents'])){
		
			$filename_old = $model->attributes['filename'];
			
			if(!empty(CUploadedFile::getInstance($model,'filename')->name))
			{
				$model->attributes = $_POST['Documents'];
				$model->filename = CUploadedFile::getInstance($model,'filename');
				$filename = $model->filename;
				$document = explode('.',$model->filename->name);
				$filenameType = $document[count($document)-1];
				$filenameName = md5(uniqid()).'.'.$filenameType;
				$model->type = end($document);
				$model->size = $model->filename->size;
				$model->md5name = $filenameName;
				$model->filename = $document[count($document)-2].".".$model->type;
				$filenames_path = Yii::getPathOfAlias('webroot').'/upload/documents/'.$filenameName;
				$flag = 1;
			}else{

				$model->attributes = $_POST['Documents'];
				$model->filename = $filename_old;
			}
			$model->updated = time();
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				if($flag == 1)
				{
					$filename->saveAs($filenames_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/Documents/'));
			}
		}
		$dataCategories = categoriesDocuments::model()->getCategoriesDocument();
		$this->render('update', array('model'=>$model, 'dataCategory'=>$dataCategories));
	}
	
	public function loadModel($id)
	{
		$model=Documents::model()->findByPk($id);
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
	
	public function actionCheckData(){
		$errors = array();
		for($i=0;$i<count($_POST['Documents']['name']); $i++){
			if(empty($_POST['Documents']['name'][$i]))	$errors['name'][$i] = 1;
			else $errors['name'][$i] = 0;
			
			if($_POST['Documents']['category_document_id'][$i] == 0)	$errors['category_document_id'][$i] = 1;
			else $errors['category_document_id'][$i] = 0;
			
		}
		
		echo json_encode($errors);
	}
}