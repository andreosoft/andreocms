<?php

use yii\helpers\Html;

$this->title = 'Создать профиль специалиста';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/users/site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form_profile', [
        'model' => $model,
    ]) ?>