<?php

namespace common\modules\callback\models\backend;

use yii\web\NotFoundHttpException;

class Callback extends \common\modules\callback\models\Callback {

    public function beforeSave($insert) {

        $this->editedby = \Yii::$app->user->getId();
        $this->editedon = date('Y-m-d H:i:s', time());

        return true;
    }


}