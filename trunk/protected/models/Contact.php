<?php

/**
 * This is the model class for table "comments_schedules".
 *
 * The followings are the available columns in table 'comments_schedules':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $address
 * @property string $phone
 * @property string $content
 * @property integer $is_schedule
 * @property integer $created
 */
class Contact extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, address, phone, content', 'required','message'=>'{attribute} không được trống'),
			array(' created', 'numerical', 'integerOnly'=>true),
			array('name, email, address', 'length', 'max'=>255),
			array('email', 'email', 'message'=>'{attribute} không hợp lệ'),
			array('title', 'length', 'max'=>500),
			array('phone', 'length', 'max'=>32),
			//array('phone', 'numerical', 'message'=>'{attribute} phải là số'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, title, address, phone, content, created', 'safe', 'on'=>'search'),
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
			'name' => 'Họ tên',
			'email' => 'Email',
			'title' => 'Tiêu đề',
			'address' => 'Địa chỉ',
			'phone' => 'Số điện thoại',
			'content' => 'Nội dung',
			'created' => 'Ngày tạo',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CommentsSchedules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
