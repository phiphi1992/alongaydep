<?php

class ContactController extends Controller
{
	/*public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}*/
	public function allowedActions()
	{
		return '*';
	}

	public function actionIndex()
	{
		if(!empty($this->arrSystem))
			$this->pageTitle = "Liên hệ - ". $this->arrSystem->title;
		
		$this->render("index");
	}
	public function actionAdd(){
		if(!empty($_POST)){
			
			$model = new Contact;
			$model->name = $_POST['name'];
			$model->email = $_POST['email'];
			$model->phone = $_POST['phone'];
			$model->address = $_POST['address'];
			$model->content = $_POST['content'];
			$model->created = time();
			
			if($model->save())	echo true;
			else echo false;
		}else	echo false;
	}
}