<?php

/**
 * This is the model class for table "product_category".
 *
 * The followings are the available columns in table 'product_category':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $created
 * @property integer $updated
 */
class ProductCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias, created', 'required', 'message'=>'{attribute} Không được trống'),
			array('created, updated', 'numerical', 'integerOnly'=>true),
			array('name, alias', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, alias, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên danh mục',
			'alias' => 'Alias',
			'created' => 'Ngày đăng',
			'updated' => 'Ngày cập nhập',
			'type' => 'type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($id = null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);
		$criteria->addCondition("type = ".$id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getDataCategories($id = null)
	{
		$dataProvider=new CActiveDataProvider('ProductCategory', array('criteria'=>array('select'=>'id, name', 'condition'=>'type='.$id)));
		$arr = $dataProvider->getData();
		$data_Categories = array();
		$data_Categories[] = '-- Chọn danh mục sản phẩm --';
		foreach($arr as $v){
				$data_Categories[$v->id] = $v->name;
		}
		return $data_Categories;
	}
	
	public function getDataCategories1()
	{
		$dataProvider=new CActiveDataProvider('ProductCategory', array('criteria'=>array('select'=>'id, name')));
		$arr = $dataProvider->getData();
		$data_Categories = array();
		$data_Categories[] = '-- Chọn danh mục sản phẩm --';
		$data_Categories[""] = '-- Hiển thị tất cả --';
		foreach($arr as $v){
			$data_Categories[$v->id] = $v->name;
		}
		return $data_Categories;
	}
}
