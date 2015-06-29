<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/users/site/reset-password', 'token' => $user->password_reset_token]);
?>

Здравствуйте, <?= Html::encode($user->username) ?>,

Перейдите по указанной ссылке для сброса пароля:

<?= Html::a(Html::encode($resetLink), $resetLink) ?>