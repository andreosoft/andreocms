<?php
namespace common\modules\rbac\rules;
use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use common\modules\users\models\User;

class UserRule extends Rule
{
    public $name = 'user';
    
    public function execute($user, $item, $params)
    {
        return !Yii::$app->user->isGuest;
    }
}