<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\modules\users\models\User;
use yii\grid\ActionColumn;
use yii\grid\CheckboxColumn;
use common\themes\admin\widgets\GridView;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= GridView::widget([
    'options' => [
        'boxTitle' => $this->title,
        'buttonCreate' => Url::to(['create', 'class' => $class]),
        'buttonUndo' => Url::home(),
        'buttonDelete' => Url::to(['batch-delete']),
        ],
    'id' => 'main-grid',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'username',
        'email',
        [
            'attribute' => 'status',
            'format' => 'html',
            'value' => function ($model) {
                if ($model->status === User::STATUS_ACTIVE) {
                    $class = 'label-success';
                    $lable = User::getStatusArray()[$model->status];
                } elseif ($model->status === User::STATUS_INACTIVE) {
                    $class = 'label-default';
                    $lable = User::getStatusArray()[$model->status];
                } elseif ($model->status === User::STATUS_BANNED) {
                    $class = 'label-danger';
                    $lable = User::getStatusArray()[$model->status];
                } elseif ($model->status === User::STATUS_DELETED) {
                    $class = 'label-warning';
                    $lable = User::getStatusArray()[$model->status];
                }

                return '<span class="label ' . $class . '">' . $lable . '</span>';
            },
            'filter' => Html::activeDropDownList(
                $searchModel,
                'status',
                User::getStatusArray(),
                ['class' => 'form-control', 'prompt' => 'Выберите статус']
            )
        ],
        [
            'attribute' => 'role',
            'format' => 'html',
            'value' => function ($model) {
                if ($model->role === User::ROLE_ADMIN) {
                    $class = 'label-danger';
                    $lable = User::getRoleArray()[$model->role];
                } elseif ($model->role === User::ROLE_MANAGER) {
                    $class = 'label-primary';
                    $lable = User::getRoleArray()[$model->role];
                } elseif ($model->role === User::ROLE_USER) {
                    $class = 'label-default';
                    $lable = User::getRoleArray()[$model->role];
                }

                return '<span class="label ' . $class . '">' . $lable . '</span>';
            },
            'filter' => Html::activeDropDownList(
                $searchModel,
                'role',
                User::getRoleArray(),
                ['class' => 'form-control', 'prompt' => 'Выберите роль']
            )
        ],                    
        ['class' => 'common\themes\admin\widgets\ActionColumn'],
    ]
]); ?>
