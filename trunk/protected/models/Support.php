<?php

/**
 * This is the model class for table "support".
 *
 * The followings are the available columns in table 'support':
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property string $yahoo
 * @property string $skype
 * @property integer $phone
 * @property integer $created
 */
class Support extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'support';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, yahoo, phone', 'required', 'message'=>'{attribute} không được trống'),
			array('name, position, yahoo, skype', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, position, yahoo, skype, phone, created', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'GroupSupport', 'group_support_id'),
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
			'position' => 'chức vụ',
			'yahoo' => 'Địa chỉ Yahoo',
			'skype' => 'Địa chỉ Skype',
			'phone' => 'Điện thoại',
			'created' => 'Ngày tạo',
			'group_support_id' => 'Nhóm hổ trợ',
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
		//$criteria->compare('id',$this->id);
		$criteria->compare('group_support_id',$this->group_support_id, true);
		$criteria->compare('t.name',$this->name,true);
		//$criteria->compare('position',$this->position,true);
		//$criteria->compare('yahoo',$this->yahoo,true);
		//$criteria->compare('skype',$this->skype,true);
		//$criteria->compare('phone',$this->phone);
		//$criteria->compare('created',$this->created);
	
		$criteria->with = array('group');
		$criteria->together = true;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Support the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
