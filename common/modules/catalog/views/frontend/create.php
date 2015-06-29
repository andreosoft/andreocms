<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\content\models\backend */

$this->title = 'Создать обявление';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/users/site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
        'model_signup_user' => $model_signup_user,
    ]) ?>

