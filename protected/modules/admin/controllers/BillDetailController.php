<?php

class BillDetailController extends Controller
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
	
	public function actionIndex($id = null)
	{
		$model = new BillDetail('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['BillDetail']))
			$model->attributes=$_GET['BillDetail'];
		$result = null;
		if($id != null){
			$criteria = new CDBCriteria();
			$criteria->select = 'number, price';
			$criteria->addCondition("bill_id = ".$id);
			$data = BillDetail::model()->findAll($criteria);
			$result = 0;
			foreach($data as $dt){
				$result += $dt->number * $dt->price;
			}
		}
		
		$this->render('index',array('model'=>$model, 'id'=>$id, 'total' => $result));
	}
}