<?php

class ContactController extends Controller
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
	
	public function actionIndex(){
		
		$model = new Contact('search');
		$model->unsetAttributes();  // clear any default values
	
		if(isset($_GET['Contact']))
			$model->attributes=$_GET['Contact'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	 
	public function actionUpdate($id=null)
	{
		
		$model = Contact::model()->findByPk($id);
		
		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			$model->created = time();
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập thư liên hệ thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/contact/index'));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Contact::model()->findByPk($id);
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
	
	public function actionGetContentByID($id){
		$arr = explode(",", $id);
		$id = $arr[count($arr)-1];
		$model=Contact::model()->findByPk($id);
		$data = array();
		$data[0] = $model->content;
		$data[1] = $model->title;
		$data[2] = $model->address;
		echo json_encode($data);
	}
}