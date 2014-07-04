<?php

/**
 * This is the model class for table "system".
 *
 * The followings are the available columns in table 'system':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $phone
 * @property string $fax
 * @property string $address
 * @property string $email
 * @property string $title_footer
 * @property string $logo
 */
class System extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'system';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, phone, fax, address, email, title_footer', 'required', 'message'=>'{attribute} không được trống'),
			array('title, address, title_footer', 'length', 'max'=>512),
			array('description', 'length', 'max'=>1024),
			array('phone ', 'length', 'min'=>10, 'max'=>32, 'tooShort'=>'{attribute} quá ngắn'),
			array('email', 'length', 'max'=>255),
			array('email', 'email', 'message'=>'{attribute} không hợp lệ'),
			//array('logo', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>'300000', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, phone, fax, address, email, title_footer, logo', 'safe', 'on'=>'search'),
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
			'title' => 'Tiêu đề trang',
			'description' => 'Mô tả',
			'phone' => 'Số điện thoại',
			'fax' => 'Fax',
			'address' => 'Địa chỉ',
			'email' => 'Email',
			'logo' => 'Logo',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('title_footer',$this->title_footer,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return System the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
