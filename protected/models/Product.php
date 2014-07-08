<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $content
 * @property string $image
 * @property integer $created
 * @property integer $updated
 * @property integer $product_category_id
 * @property integer $price
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias, description, content, product_category_id, price', 'required', 'message'=>'{attribute} không được trống'),
			array('created, updated, product_category_id, price', 'numerical', 'integerOnly'=>true, 'message'=>'{attribute} phải là số'),
			array('name, alias, image', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, alias, description, content, image, created, updated, product_category_id, price', 'safe', 'on'=>'search'),
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
			'productCategory' => array(self::BELONGS_TO, 'ProductCategory', 'product_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên sản phẩm',
			'alias' => 'Alias',
			'description' => 'Mô tả',
			'content' => 'Nội dung',
			'image' => 'Hình ảnh',
			'created' => 'Ngày đăng',
			'updated' => 'Ngày cập nhập',
			'product_category_id' => 'Danh mục sản phẩm',
			'price' => 'Giá',
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
		$criteria->compare('image',$this->image,true);
		//$criteria->compare('alias',$this->alias,true);
		//$criteria->compare('description',$this->description,true);
		//$criteria->compare('content',$this->content,true);
		//$criteria->compare('image',$this->image,true);
		//$criteria->compare('created',$this->created);
		//$criteria->compare('updated',$this->updated);
		$criteria->compare('product_category_id',$this->product_category_id);
		//$criteria->compare('price',$this->price);
		$criteria->with = array('productCategory');
		$criteria->together = true;
		$criteria->addCondition("t.type=".$id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
