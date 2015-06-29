<?php

namespace common\modules\rbac\rules;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'author';

    public function execute($user, $item, $params)
    {
        return isset($params['model']) ? $params['model']['createdby'] == $user : false;
    }
}