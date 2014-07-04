<?php

class User extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;
	
	//TODO: Delete for next version (backward compatibility)
	const STATUS_BANED=-1;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
     * @var timestamp $create_at
     * @var timestamp $lastvisit_at
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableUsers;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.CConsoleApplication
		return ((get_class(Yii::app())=='CConsoleApplication' || (get_class(Yii::app())!='CConsoleApplication' && isAdmin()))?array(
			array('username', 'length', 'min'=>3,'max'=>20, 'tooShort'=>UserModule::t("{attribute} phải tối thiểu 3 ký tự.")),
			array('password', 'length', 'max'=>128, 'min' => 6,'tooShort'=>UserModule::t("{attribute} phải tối thiểu 6 ký tự.")),
			array('email', 'email', 'message'=>UserModule::t("{attribute} không phải là một địa chỉ email hợp lệ.")),
			array('username,email', 'unique', 'message' => UserModule::t("{attribute} này đã tồn tại.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_.]+$/u','message' => UserModule::t("{attribute} chỉ hợp lệ với các ký tự (A-z0-9).")),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANNED)),
			array('superuser', 'in', 'range'=>array(0,1)),
			array('create_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
			array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			array('username, email, superuser, status, password', 'required','message'=>UserModule::t("{attribute} không thể trống.")),
			array('superuser, status', 'numerical', 'integerOnly'=>true),
			array('id, username, password, email, activkey, create_at, lastvisit_at, superuser, status', 'safe', 'on'=>'search'),
		):((Yii::app()->user->id==$this->id)?array(
			array('username, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'tooShort'=>UserModule::t("{attribute} phải tối thiểu 3 ký tự.")),
			array('email', 'email'),
			array('username,email', 'unique', 'message' => UserModule::t("{attribute} này đã tồn tại.")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_.]+$/u','message' => UserModule::t("{attribute} chỉ hợp lệ với các ký tự (A-z0-9).")),
		):array()));
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        $relations = Yii::app()->getModule('user')->relations;
        if (!isset($relations['profile']))
            $relations['profile'] = array(self::HAS_ONE, 'Profile', 'user_id');
        $relations['class'] = array(self::HAS_MANY, 'UsersClass', 'user_id');
        $relations['group'] = array(self::HAS_MANY, 'UsersGroup', 'user_id');
		
        return $relations;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => UserModule::t("ID"),
			'username'=>UserModule::t("Tên sử dụng"),
			'password'=>UserModule::t("Mật khẩu"),
			'verifyPassword'=>UserModule::t("Retype Password"),
			'email'=>UserModule::t("E-mail"),
			'verifyCode'=>UserModule::t("Verification Code"),
			'activkey' => UserModule::t("activation key"),
			'createtime' => UserModule::t("Registration date"),
			'create_at' => UserModule::t("Ngày đăng ký"),
			'lastvisit_at' => UserModule::t("Đăng nhập cuối"),
			'superuser' => UserModule::t("Superuser"),
			'status' => UserModule::t("Trạng thái"),
			'last_activity' => UserModule::t("Last Activity"),
			'fullname' => UserModule::t("Tên người dùng"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactive'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANNED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, superuser, status, last_activity',
            ),
        );
    }
	
	public function defaultScope()
    {
        return CMap::mergeArray(Yii::app()->getModule('user')->defaultScope,array(
            'alias'=>'user',
            'select' => 'user.id, user.username, user.email, user.create_at, user.lastvisit_at, user.superuser, user.status',
        ));
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_ACTIVE => UserModule::t('Đã kích hoạt'),
				self::STATUS_NOACTIVE => UserModule::t('Chưa kích hoạt'),
				self::STATUS_BANNED => UserModule::t('Ngưng'),
			),
			'AdminStatus' => array(
				'0' => UserModule::t('No'),
				'1' => UserModule::t('Yes'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
/**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        $criteria->compare('create_at',$this->create_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }
	
	public $fullname = '';
    public function searchNew()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        $criteria->with = array('profile');
        $criteria->together = true;
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        $criteria->compare('create_at',$this->create_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('profile.fullname',$this->fullname,true);
        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
			'sort'=>array(
					 'defaultOrder'=>'id DESC',
				    'attributes'=>array(
			            'fullname'=>array(
			                'asc'=>'profile.fullname',
			                'desc'=>'profile.fullname DESC',
			            ),
				    ),
				),
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }
	
	public function getType($alias=false){
		$roles=Rights::getAssignedRoles($this->id);
		foreach($roles as $role){
			if($alias == true)
				return $role->name;
			return $role->getNameText();
		}
	}

    public function getCreatetime() {
        return strtotime($this->create_at);
    }

    public function setCreatetime($value) {
        $this->create_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }

	/**
	* This is function used get users is teacher
	* @author: VuNFH
	*/
	public function getUsersIsTeacher() {
		$teachers = Yii::app()->db->createCommand()->select('id')
		->from('users u')
		->join('authassignment au','u.id = au.userid')
		->join('profiles p','u.id = p.user_id')
		->where('u.status = :status AND au.itemname = :item',array(':status'=>1,':item'=>'teacher'))
		->queryAll();
		return $teachers;
	}
	
	# Phương thức để get group hiện tại của user đang ở trạng thái active
	public function getCurrentGroup(){
		$criteria  =  new CDbCriteria;
		$criteria->with = array('group');
		$criteria->condition = 'group.status = 1 AND t.user_id = '.$this->id;
		$group =  UsersGroup::model()->find($criteria);
		if($group != null){
			return $group->group_id;
		}
		return null;
	}
}