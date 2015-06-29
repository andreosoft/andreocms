<?php

/**
 * Activation email view.
 *
 * @var \yii\web\View $this View
 * @var \vova07\users\models\frontend\User $model Model
 */

use yii\helpers\Html;
use yii\helpers\Url;

 ?>
<p>Здравствуйте <?= Html::encode($model->username) ?>!</p>
<p>Вы успешно прошли регистрацию на сайте: <?= \Yii::$app->name?></p>
<p>Ваши учетные данные: </p>
<p><b>Имя пользователя: </b> <?= $model->username ?></p>
<p><b>Адрес электронной почты: </b> <?= $model->email ?></p>