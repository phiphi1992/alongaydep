<?php

class ProductCategoryController extends Controller
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
		$model = new ProductCategory('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['ProductCategory']))
			$model->attributes=$_GET['ProductCategory'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new ProductCategory;
		
		if(isset($_POST['ProductCategory']))
		{
			$model->attributes=$_POST['ProductCategory'];
			$model->created = time();
			$model->alias = alias($_POST['ProductCategory']['name']);
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/productCategory/index'));
			}
		}
		
		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = ProductCategory::model()->findByPk($id);
		
		if(isset($_POST['ProductCategory']))
		{
			
			$model->attributes=$_POST['ProductCategory'];
			$model->created = time();
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/productCategory/index'));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=ProductCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function unlink($path, $name){
		
		$path = realpath(Yii::app()->basePath.$path.$name);
		if(file_exists($path) && !empty($name)) 
		{	
			unlink($path);
			return true;
			
		}else	return false;
	}
	
	public function actionDelete($id)
	{
		// Delete all news of category new
		$model = $this->loadModel($id);
		
		// delete all product
		if(!empty($model)){
			$criteria = new CDBCriteria();
			$criteria->addCondition("product_category_id = {$id}");
			$criteria->select = "id";
			$arrProduct = Product::model()->findALl($criteria);
			
			foreach($arrProduct as $product){
			
				$modelProduct = product::model()->find($product->id);
				
				// delete all images
				if(!empty($modelProduct)){
					$criteria = new CDBCriteria();
					$criteria->addCondition("product_id = {$modelProduct->id}");
					$criteria->select = "id";
					$arrImage = ProductImage::model()->findALl($criteria);
					
					foreach($arrImage as $ProductImage){
					
						$modelImage = ProductImage::model()->find($ProductImage->id);
						$path = "/../upload/images/";
						$name = $modelImage->image;
						$this->unlink($path, $name);
						$modelImage->delete();
					}
				}
				
				$modelProduct->delete();
			}
		}
		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		for($i=0; $i<count($arrIdNew); $i++){
			
			// Delete all news of category new
			$model = $this->loadModel($arrIdNew[$i]);
			
			if(!empty($model)){
				$criteria = new CDBCriteria();
				$criteria->addCondition("product_category_id = {$arrIdNew[$i]}");
				$criteria->select = "id";
				$arrProduct = Product::model()->findALl($criteria);
				
				foreach($arrProduct as $product){
				
					$modelProduct = product::model()->find($product->id);
					
					// delete all images
					if(!empty($modelProduct)){
						$criteria = new CDBCriteria();
						$criteria->addCondition("product_id = {$modelProduct->id}");
						$criteria->select = "id";
						$arrImage = ProductImage::model()->findALl($criteria);
						
						foreach($arrImage as $ProductImage){
						
							$modelImage = ProductImage::model()->find($ProductImage->id);
							$path = "/../upload/images/";
							$name = $modelImage->image;
							$this->unlink($path, $name);
							$modelImage->delete();
						}
					}
					
					$modelProduct->delete();
				}
			}
			
			// Delete category new
			$model->delete();
			
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
}