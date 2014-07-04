<?php

class QuestionAnswersController extends Controller
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
		
		$model = new QuestionAnswers('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['QuestionAnswers']))
			$model->attributes=$_GET['QuestionAnswers'];

		$this->render('index',array('model'=>$model));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

	
	
	public function actionUpdate($id)
		{
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['QuestionAnswers']))
			{
				$model->attributes=$_POST['QuestionAnswers'];
				$model->updated = time();
				
				if($model->save())
				{
					Yii::app()->user->setFlash('success', translate('Sửa thành công.'));
					$this->redirect(PIUrl::createUrl('/admin/questionAnswers/'));
				}
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}
	
	public function actionCreate()
	{
		$model = new QuestionAnswers;
		
		if(isset($_POST['QuestionAnswers']))
		{
			$model->attributes=$_POST['QuestionAnswers'];
			$model->created = time();
			
			if($model->save())
			{
				
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/questionAnswers/index'));
			}
		}
		
		$this->render('create', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=QuestionAnswers::model()->findByPk($id);
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