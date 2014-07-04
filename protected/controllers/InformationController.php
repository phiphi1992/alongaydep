<?php

class InformationController extends Controller
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
			$this->pageTitle = "Giới thiệu - ". $this->arrSystem->title;
		
		$this->render("index");
	}
}