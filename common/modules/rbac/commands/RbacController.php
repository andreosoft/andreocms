<?php
namespace common\modules\rbac\commands;

use Yii;
use yii\console\Controller;
use common\modules\rbac\rules\AuthorRule;
use common\modules\rbac\rules\UserRule;
use common\modules\rbac\rules\GroupRule;

class RbacController extends Controller
{
    public $defaultAction = 'init';
    
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); 
        
        $authorRule = new AuthorRule();
        $auth->add($authorRule);    
        
        $accessBackend = $auth->createPermission('accessBackend');
        $accessBackend->description = 'Can access backend';
        $auth->add($accessBackend);

        $rule = new GroupRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $auth->add($user);
        
        $manager = $auth->createRole('manager');
        $manager->description = 'Менеджер';
        $manager->ruleName = $rule->name;
        $auth->add($manager);
        $auth->addChild($manager, $user);
        $auth->addChild($manager, $accessBackend);
        
        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $manager);
    }
}