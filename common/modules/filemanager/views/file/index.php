<?php

use yii\helpers\Html;
use common\modules\filemanager\widgets\fileManager\FileManager;
?>

<?= FileManager::widget([
    'options' => [
        'rootAlias' => $rootAlias,
    ],
]) ?>