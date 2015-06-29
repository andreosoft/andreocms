<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = \Yii::$app->name.' - '.$model->name;
$this->params['breadcrumbs'][] = $model->name;
?>

<h1><?= $model->name ?></h1>
<?php empty($model->introtext) ? '' : print '<p>' . $model->introtext . '</p>' ?>
<?php empty($model->image) ? '' : print '<p>' . Html::img(Url::to('@webuploads' . $model->image, true), ['class' => 'img-responsive']) . '</p>' ?>
<p><?= $model->content ?></p>