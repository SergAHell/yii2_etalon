<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\AuthUser;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends AuthUser
{
    public $username;
    public $password;
    public $rememberMe = true;

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
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @return bool|void
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = AuthUser::findByUsername($this->username);

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
}
