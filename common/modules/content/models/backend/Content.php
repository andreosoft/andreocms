<?php

namespace common\modules\content\models\backend;

use yii\web\NotFoundHttpException;

class Content extends \common\modules\content\models\Content {

    public function beforeSave($insert) {
        
        if ($this->seo_url == '') {
            $this->seo_url = str_replace(' ', '_', $this->name);
        }

        if ($this->status == Content::STATUS_PUBLISHED) {
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
