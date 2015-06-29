<?php

namespace common\modules\catalog\models\backend;

use yii\web\NotFoundHttpException;

class CatalogProducts extends \common\modules\catalog\models\CatalogProducts {

    public function beforeSave($insert) {

        if ($this->seo_url == '') {
            $this->seo_url = $this->name;
        }
        
        if ($this->status == CatalogProducts::STATUS_PUBLISHED) {
            if ($this->publishedby == 0) {
                $this->publishedby = \Yii::$app->user->getId();
                $this->publishedon = date('Y-m-d H:i:s', time());
            }
        } else {
            $this->publishedby = 0;
            $this->publishedon = '';
        }

        $this->updatedby = \Yii::$app->user->getId();
        $this->updatedon = date('Y-m-d H:i:s', time());

        return true;
    }


}