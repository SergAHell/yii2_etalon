<?php

namespace app\models;


use yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class AuthUser
 * @package app\models
 */
class AuthUser extends ActiveRecord implements \yii\web\IdentityInterface
{

//	public $id;
//	public $auth_key;

//	public $username;
	public $password;
	public $rememberMe = true;

	/**
	 * @return string
	 */
	public static function tableName()
	{
		return 'auth_user';
	}

	/**
	 * @param int|string $id
	 * @return null|static
	 */
	public static function findIdentity($id)
	{  
		$data =  static::findOne($id);
//		var_dump('id=' . print_r( $id, 1));
//		var_dump('data='. print_r( $data,1));
//		die();
		return $data;
	}

	/**
	 * @param mixed $token
	 * @param null $type
	 * @return null|static
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		$data = static::findOne(['access_token' => $token]);
//		var_dump('token=' . print_r( $token, 1));
//		var_dump('data='. print_r( $data,1));
//		die();
		return $data;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @param string $authKey
	 * @return bool
	 */
	public function validateAuthKey($authKey)
	{
//		return true;
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * @param $password
	 * @return bool
	 */
	public function validatePassword($password)
	{
//		$user = $this::findByUsername($this->username);
//		echo "<pre>";
//		echo print_r($user->password_hash,1);
//		echo "</pre>";
//		echo "<br><br><br>validatePassword($password) " . $this->password_hash;
//		die($password . ' '.  Yii::$app->security->generatePasswordHash($password,10));
//		return $password === $this->password_hash;
		$user = $this::findByUsername($this->username);
		return $user && \Yii::$app->security->validatePassword($password, $user->password_hash);
	}

	/**
	 * @param $username
	 * @return null|static
	 */
	public static function findByUsername($username)
	{
//		echo "<pre>";
		$data = static::findOne(['username' => $username]);
//		echo print_r($data,1);
//		die();
		return $data;
//		foreach (self::$users as $user) {
//			if (strcasecmp($user['username'], $username) === 0) {
//				return new static($user);
//			}
//		}

//		return null;
	}

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			// username and password are both required
			[['username', 'password'], 'required'],
			// rememberMe must be a boolean value
			['rememberMe', 'boolean'],
			// password is validated by validatePassword()
			['password', 'validateFormPassword'],
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validateFormPassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			//$user = $this->getUser();

			if (!$this->validatePassword($this->password)) {
				$this->addError($attribute, 'Incorrect username or password.');
			}
		}
	}

	public function login()
	{
		if ($this->validate()) {
//			echo "<pre>  $this->username <br>aaa" . print_r(self::findByUsername($this->username),1) . "</pre>";die();
			return \Yii::$app->user->login(self::findByUsername($this->username), $this->rememberMe ? 3600*24*30 : 0);
		}
		return false;
	}


	public function attributeLabels()
	{
		return [
			'username'=>'Имя пользователя',
			'password' => 'Пароль',
			'rememberMe' => 'Запомнить меня'
		];
	}

}