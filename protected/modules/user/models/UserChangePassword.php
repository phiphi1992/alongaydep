<?php
/**
 * UserChangePassword class.
 * UserChangePassword is the data structure for keeping
 * user change password form data. It is used by the 'changepassword' action of 'UserController'.
 */
class UserChangePassword extends CFormModel {
	public $oldPassword;
	public $password;
	public $verifyPassword;
	
	public function rules() {
		return Yii::app()->controller->id == 'recovery' ? array(
			array('password, verifyPassword', 'required','message' => UserModule::t("{attribute} không được trống.")),
			array('password, verifyPassword', 'length', 'max'=>128, 'min' => 6,'tooShort' => UserModule::t("{attribute} phải tối thiểu 6 ký tự")),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("{attribute} là không chính xác.")),
		) : array(
			array('oldPassword, password, verifyPassword', 'required','message' => UserModule::t("{attribute} không được trống.")),
			array('oldPassword, password, verifyPassword', 'length', 'max'=>128, 'min' => 6,'tooShort' => UserModule::t("{attribute} phải tối thiểu 6 ký tự.")),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("{attribute} là không chính xác.")),
			array('oldPassword', 'verifyOldPassword'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'oldPassword'=>UserModule::t("Mật khẩu cũ"),
			'password'=>UserModule::t("Mật khẩu mới"),
			'verifyPassword'=>UserModule::t("Nhập lại mật khẩu mới"),
		);
	}
	
	/**
	 * Verify Old Password
	 */
	 public function verifyOldPassword($attribute, $params)
	 {
		 if (User::model()->notsafe()->findByPk(Yii::app()->user->id)->password != Yii::app()->getModule('user')->encrypting($this->$attribute))
			 $this->addError($attribute, UserModule::t("Mật khẩu không đúng."));
	 }
}