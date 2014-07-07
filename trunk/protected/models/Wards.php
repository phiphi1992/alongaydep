<?php

/**
 * This is the model class for table "wards".
 *
 * The followings are the available columns in table 'wards':
 * @property integer $id
 * @property string $title
 * @property integer $province_id
 * @property string $code
 * @property integer $published
 * @property integer $ordering
 */
class Wards extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wards';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('province_id, published, ordering', 'numerical', 'integerOnly'=>true),
			array('title, code', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, province_id, code, published, ordering', 'safe', 'on'=>'search'),
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
			'ward' => array(self::BELONGS_TO, 'Provinces', 'province_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Quận/Huyện',
			'province_id' => 'Tỉnh/Thành phố',
			'code' => 'Code',
			'published' => 'Published',
			'ordering' => 'Ordering',
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
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('province_id',$this->province_id);
		//$criteria->compare('code',$this->code,true);
		//$criteria->compare('published',$this->published);
		//$criteria->compare('ordering',$this->ordering);
		$criteria->with = array('ward');
		$criteria->together = true;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getWards($id){
		$criteria = new CDbCriteria;
		$criteria->addCondition("province_id = {$id}");
		$criteria->select = "id, title";
		$wards =  Wards::model()->findAll($criteria);
		$result = array();
		foreach($wards as $ward){
			$result[$ward->id] = $ward->title;
		}
		return $result;
	}
	
	public function getWards1($id){
		$criteria = new CDbCriteria;
		$criteria->addCondition("province_id = {$id}");
		$criteria->select = "id, title";
		$wards =  Wards::model()->findAll($criteria);
		$result = array();
		foreach($wards as $ward){
			$result[] = array('id' => $ward->id, 'title' => $ward->title);
		}
		return $result;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Wards the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getData(){
		$data = Wards::model()->findALl();
		$result = array();
		$result[''] = '-- chọn quận/huyện --';
		foreach($data as $dt){
			$result[$dt->id] = $dt->title;
		}
		return $result;
	}
}
