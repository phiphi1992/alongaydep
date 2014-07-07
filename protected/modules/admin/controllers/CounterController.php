<?php

class CounterController extends Controller
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
		
		$model = Counter::model()->find();
		if(empty($model))
			$model = new Counter;
		if(!empty($_POST['Counter'])){
			$model->attributes = $_POST['Counter'];
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/counter'));
			}
		}
		$this->render('index',array('model'=>$model));
	}
	
}