<?php

class BillController extends Controller
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
		$model = new Bill('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Bill']))
			$model->attributes=$_GET['Bill'];

		$this->render('index',array('model'=>$model));
	}

	public function loadModel($id)
	{
		$model=Bill::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		// Xóa chi tiết đơn hàng
		$billDetail =  new BillDetail();
		$criteria = new CDBCriteria;
		$criteria->addCondition("bill_id = ".$id);
		$billDetail->deleteAll($criteria);
		// Xóa đơn hàng
		$model->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			
			$model = $this->loadModel($arrIdNew[$i]);
			// Xóa chi tiết đơn hàng
			$billDetail =  new BillDetail();
			$criteria = new CDBCriteria;
			$criteria->addCondition("bill_id = ".$arrIdNew[$i]);
			$billDetail->deleteAll($criteria);
			// Xóa đơn hàng
			$model->delete();
		}
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}