<?php

class DefaultController extends Controller
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
		$criteriaContact = new CDbCriteria;
		$criteriaContact->limit = 10;
		$criteriaContact->order = "id DESC";
		$contact = Contact::model()->findAll($criteriaContact);
		$this->render('index',compact('contact'));
	}

	public function actionFileConfig()
	{
		$this->render('file_config');
	}
}