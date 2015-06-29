<?php

namespace common\modules\calendar\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $id
 * @property string $title
 * @property string $start
 * @property string $end
 * @property double $all-day
 * @property string $url
 * @property integer $createdby
 * @property string $createdon
 * @property integer $status
 * @property string $background-color
 * @property string $border-color
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start', 'end', 'createdon'], 'safe'],
            [['all-day'], 'number'],
            [['createdby', 'status'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            [['background-color', 'border-color'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'start' => 'Start',
            'end' => 'End',
            'all-day' => 'All Day',
            'url' => 'Url',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'status' => 'Status',
            'background-color' => 'Background Color',
            'border-color' => 'Border Color',
        ];
    }
}
