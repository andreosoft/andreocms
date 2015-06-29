<?php

namespace common\modules\rbac\rules;

use Yii;
use yii\rbac\Rule;

class GroupRule extends Rule
{

    public $name = 'group';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;

            if ($item->name === 'admin') {
                return $role === $item->name;
            } elseif ($item->name === 'manager') {
                return $role === $item->name || $role === 'admin';
            } elseif ($item->name === 'user') {
                return $role === $item->name || $role === 'manager' || $role === 'admin';
            }
        }
        return false;
    }
}