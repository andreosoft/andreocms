<?php
namespace common\modules\users\models\backend;

use common\modules\users\models\User;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class NewPassword extends Model 
{
    public $password;
    public $user;
    
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    
   public function attributeLabels() {
        return [
            'password' => 'Пароль',
        ];
    }
    
    public function attributeHints() {
        return [
            'password' => 'Пароль не менее 6-и символов',
        ];        
    }
    public function resetPassword()
    {
        $user = $this->user;
        $user->password = $this->password;
        $user->removePasswordResetToken();

        return $user->save();
    }
}