<?php

/**
 * This is the model class for table "sub_category_news".
 *
 * The followings are the available columns in table 'sub_category_news':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $created
 * @property integer $category_new_id
 */
class SubCategoryNews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sub_category_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias, created, category_new_id', 'required', 'message'=>'{attribute} không được trống'),
			array('created, category_new_id', 'numerical', 'integerOnly'=>true),
			array('name, alias', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, alias, created, category_new_id', 'safe', 'on'=>'search'),
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
			'categories' => array(self::BELONGS_TO, 'CategoriesNews', 'category_new_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên',
			'alias' => 'Alias',
			'created' => 'Ngày đăng',
			'category_new_id' => 'Danh mục tin tức',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('category_new_id',$this->category_new_id);
		$criteria->with = array('categories');
		$criteria->together = true;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubCategoryNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getDataCategories($id)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'id,  name';
		$criteria->addCondition('category_new_id = '.$id);
		$dataProvider=new CActiveDataProvider('SubCategoryNews',array('criteria' => $criteria,));
		$arr = $dataProvider->getData();
		$data_Categories = array();
		$data_Categories[] = '-- Chọn danh mục tin tức --';
		foreach($arr as $v){
			if($v->id != 1)
				$data_Categories[$v->id] = $v->name;
		}
		return $data_Categories;
	}
	
	public function getDataCategories1()
	{
		$dataProvider=new CActiveDataProvider('SubCategoryNews', array('criteria'=>array('select'=>'id, name')));
		$arr = $dataProvider->getData();
		$data_Categories = array();
		$data_Categories[] = '-- Chọn danh mục tin tức --';
		$data_Categories[""] = '-- Hiển thị tất cả --';
		foreach($arr as $v){
			if($v->id != 1)
			$data_Categories[$v->id] = $v->name;
		}
		return $data_Categories;
	}
}
