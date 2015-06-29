<?php

namespace common\modules\callback\models;

use Yii;

/**
 * This is the model class for table "callback".
 *
 * @property integer $id
 * @property string $name
 * @property string $adress
 * @property string $email
 * @property string $phone
 * @property string $content
 * @property string $data
 * @property string $url
 * @property integer $createdby
 * @property string $createdon
 * @property integer $editedby
 * @property string $editedon
 * @property integer $status
 */
class Callback extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_FINISHED = 1;  
    const STATUS_DELETED = 2; 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['createdby', 'editedby', 'status'], 'integer'],
            [['createdon', 'editedon'], 'safe'],
            [['name', 'adress', 'email', 'phone', 'data', 'url'], 'string', 'max' => 255],
            [['name'], 'required'],
//            [['phone'], 'required'],
            ['createdon', 'default', 'value' => date('Y-m-d H:i:s', time())],
            ['createdby', 'default', 'value' => \Yii::$app->user->getIsGuest()? 0 : \Yii::$app->user->getId()],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => \Yii::t('callback/main', 'Name'),
            'adress' => 'Adress',
            'email' => 'Email',
            'phone' => \Yii::t('callback/main', 'Phone'),
            'content' => \Yii::t('callback/main', 'Content'),
            'data' => 'Data',
            'url' => 'Url',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'editedby' => 'Editedby',
            'editedon' => 'Editedon',
            'status' => 'Status',
        ];
    }
    
    public function attributeHints() {
        return [
            
        ];
    }
        
    public static function getStatusArray()
    {
        return [
            self::STATUS_NEW => \Yii::t('callback/main', 'New'),
            self::STATUS_FINISHED => \Yii::t('callback/main', 'Finished'),
            self::STATUS_DELETED => \Yii::t('callback/main', 'Deleted'),
        ];
    }

}
