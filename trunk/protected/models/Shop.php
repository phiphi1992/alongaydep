<?php

/**
 * This is the model class for table "shop".
 *
 * The followings are the available columns in table 'shop':
 * @property integer $id
 * @property string $name_shop
 * @property string $license
 * @property string $name
 * @property string $other
 * @property string $logo
 * @property string $detail_shop
 * @property string $lot_number
 */
class Shop extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_shop, license, name, other, logo, detail_shop, lot_number', 'required','message'=>'{attribute} không được trống'),
			array('name_shop, license, name, other, lot_number', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name_shop, license, name, other, logo, detail_shop,created, lot_number', 'safe', 'on'=>'search'),
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
			'name_shop' => 'Tên quầy',
			'license' => 'Giấp phép',
			'name' => 'Tên chủ quầy',
			'other' => 'Các thông tin khác',
			'logo' => 'Hình đại diện',
			'detail_shop' => 'Chi tiết quầy hàng',
			'lot_number' => 'Số lô',
			'created'=>'Ngày tạo',
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
		$criteria->compare('name_shop',$this->name_shop,true);
		$criteria->compare('license',$this->license,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('detail_shop',$this->detail_shop,true);
		$criteria->compare('lot_number',$this->lot_number,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shop the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
