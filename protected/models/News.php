<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $category_news_id
 * @property string $description
 * @property string $content
 * @property string $image
 * @property integer $created
 * @property integer $parent_id
 */
class News extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, created, description, content', 'required', 'message'=>'{attribute} không được trống'),
			array('category_news_id, created', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>500),
			array('image', 'length', 'max'=>255),
			//array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>'300000', 'allowEmpty'=>true),
			array('description, content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, alias, category_news_id, description, content, image, created', 'safe', 'on'=>'search'),
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
			'categories' => array(self::BELONGS_TO, 'CategoriesNews', 'category_news_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Số thứ tự',
			'name' => 'Tên tin tức',
			'alias' => 'Alias',
			'category_news_id' => 'Danh mục tin tức',
			'description' => 'Mô tả',
			'content' => 'Nội dung',
			'image' => 'Hình ảnh',
			'created' => 'Ngày đăng',
			'parent_id' => 'Danh muc cha',
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
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.parent_id',$this->parent_id);
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
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	function getImage($name='no-image.png',$w=100,$h=100,$zc=0){
	if($name == '') $name = 'no-image.png';
	if(!file_exists(Yii::getPathOfAlias('webroot').'/upload/images/'.$name))
		$name = 'no-image.png';
	return Yii::app()->getBaseUrl(true)."/image/{$w}/{$h}/{$zc}/{$name}";
}
}
