<?php

/**
 * This is the model class for table "documents".
 *
 * The followings are the available columns in table 'documents':
 * @property integer $id
 * @property string $name
 * @property string $size
 * @property string $type
 * @property string $filename
 * @property string $md5name
 * @property integer $category_document_id
 * @property integer $type_document
 * @property integer $created
 * @property integer $updated
 */
class Documents extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, size, type, filename, md5name, created', 'required'),
			array('category_document_id', 'numerical', 'integerOnly'=>true),
			array('name, filename, md5name', 'length', 'max'=>512),
			array('size', 'length', 'max'=>32),
			array('type', 'length', 'max'=>16),
			//array('filename', 'file', 'types'=>'doc, docx', 'maxSize'=>'30000', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, size, type, filename, md5name, category_document_id, type_document, created, updated', 'safe', 'on'=>'search'),
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
			'category_document' => array(self::BELONGS_TO, 'CategoriesDocuments', 'category_document_id'),
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
			'size' => 'kích thước file',
			'type' => 'Kiểu file',
			'filename' => 'Tên file',
			'md5name' => 'Md5name',
			'category_document_id' => 'Tên danh mục',
			'type_document' => 'Type Document',
			'created' => 'Ngày đăng',
			'updated' => 'Ngày cập nhập',
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
	public function search($id = 1)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('md5name',$this->md5name,true);
		$criteria->compare('category_document_id',$this->category_document_id);
		if(isset($this->category_document_id) && !empty($this->category_document_id))	$criteria->compare('t.category_document_id',$this->category_document_id);
		$criteria->compare('type_document',$this->type_document);
		//$criteria->compare('created',$this->created);
		//$criteria->compare('updated',$this->updated);
		$criteria->with = array('category_document');
		$criteria->together = true;
		$criteria->addCondition("type_document={$id}");
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Documents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
