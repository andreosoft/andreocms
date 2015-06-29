<?php

namespace common\modules\gallery\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property integer $table_id
 * @property string $table_name
 * @property integer $parent
 * @property integer $parent_id
 * @property integer $status
 * @property integer $createdby
 * @property string $createdon
 * @property string $url
 * @property string $url_preview
 * @property string $name
 * @property string $introtext
 * @property string $content
 * @property integer $like
 * @property integer $dislike
 * @property integer $views
 * @property integer $rate
 * @property integer $rate_num
 */
class Gallery extends \yii\db\ActiveRecord
{

    const STATUS_NOT_PUBLISHED = 0;
    const STATUS_PUBLISHED = 1;  
    const STATUS_DELETED = 2; 
            
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_id', 'parent', 'parent_id', 'status', 'createdby', 'like', 'dislike', 'views', 'rate', 'rate_num', 'sort'], 'integer'],
            [['createdon'], 'safe'],
            [['introtext', 'content'], 'string'],
            [['table_name', 'image', 'name'], 'string', 'max' => 255],
            ['createdby', 'default', 'value' => \Yii::$app->user->getId()],
            ['createdon', 'default', 'value' => date('Y-m-d H:i:s', time())],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'table_id' => 'Table ID',
            'table_name' => 'Table Name',
            'parent' => 'Parent',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'url' => 'Url',
            'url_preview' => 'Url Preview',
            'name' => 'Наименование',
            'introtext' => 'Introtext',
            'content' => 'Content',
            'like' => 'Like',
            'dislike' => 'Dislike',
            'views' => 'Views',
            'rate' => 'Rate',
            'rate_num' => 'Rate Num',
            'sort' => 'Sort',
        ];
    }
    
    public function attributeHints()
    {
        return [
            'id' => 'ID',
            'table_id' => 'Table ID',
            'table_name' => 'Table Name',
            'parent' => 'Parent',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'url' => 'Url',
            'url_preview' => 'Url Preview',
            'name' => 'Наименование',
            'introtext' => 'Introtext',
            'content' => 'Content',
            'like' => 'Like',
            'dislike' => 'Dislike',
            'views' => 'Views',
            'rate' => 'Rate',
            'rate_num' => 'Rate Num',
            'file' => 'Файл',
        ];
    } 
    
    public static function getStatusArray()
    {
        return [
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_NOT_PUBLISHED => 'Not Published',
            self::STATUS_DELETED => 'Deleted',
        ];
    }    
}
