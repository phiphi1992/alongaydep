<?php

/**
 * This is the model class for table "hotel".
 *
 * The followings are the available columns in table 'hotel':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $type
 * @property integer $provinces
 * @property integer $wards
 * @property string $address
 * @property string $email
 * @property integer $phone
 * @property string $created
 * @property string $updated
 * @property string $image
 */
class Hotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias, type, provinces, wards, address, email, phone', 'required', 'message'=>'{attribute} không được trống'),
			array('provinces, wards', 'numerical', 'integerOnly'=>true),
			array('name, alias, type, address, image', 'length', 'max'=>255),
			array('email, created, updated', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, alias, type, provinces, wards, address, email, phone, created, updated, image', 'safe', 'on'=>'search'),
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
			'pro' => array(self::BELONGS_TO, 'Provinces', 'provinces'),
			'ward' => array(self::BELONGS_TO, 'Wards', 'wards'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên khách sạn',
			'alias' => 'Alias',
			'type' => 'Loại khách sạn',
			'provinces' => 'Tỉnh/Thành phố',
			'wards' => 'Quận/Huyện',
			'address' => 'Địa chỉ',
			'email' => 'Địa chỉ email',
			'phone' => 'Điện thoại',
			'created' => 'Ngày đăng',
			'updated' => 'Ngày cập nhập',
			'image' => 'Hình ảnh',
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
		//$criteria->compare('alias',$this->alias,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('provinces',$this->provinces);
		$criteria->compare('wards',$this->wards);
		//$criteria->compare('address',$this->address,true);
		//$criteria->compare('email',$this->email,true);
		//$criteria->compare('phone',$this->phone);
		//$criteria->compare('created',$this->created,true);
		//$criteria->compare('updated',$this->updated,true);
		//$criteria->compare('image',$this->image,true);
		$criteria->with = array('pro', 'ward');
		$criteria->together = true;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getTypeHotel(){
		$data = array(
			'' => '-- Chọn loại khách sạn --',
			1 => 'Nhà nghĩ',
			2 => 'Khách sạn 1 sao',
			3 => 'Khách sạn 2 sao',
			4 => 'Khách sạn 3 sao',
			5 => 'Khách sạn 4 sao',
			6 => 'Khách sạn 5 sao',
		);
		return $data;
	}
	public function getType($id){
		$result = '';
		switch($id){
			case 1 : $result = 'Nhà nghĩ'; break;
			case 2 : $result = 'Khách sạn 1 sao'; break;
			case 3 : $result = 'Khách sạn 2 sao'; break;
			case 4 : $result = 'Khách sạn 3 sao'; break;
			case 5 : $result = 'Khách sạn 4 sao'; break;
			case 6 : $result = 'Khách sạn 5 sao'; break;
		}
		return $result;
	}
}
