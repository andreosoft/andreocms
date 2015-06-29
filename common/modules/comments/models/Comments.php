<?php

namespace common\modules\comments\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $table_id
 * @property string $table_name
 * @property double $parent
 * @property integer $parent_id
 * @property integer $createdby
 * @property string $createdon
 * @property double $rate
 * @property integer $rate_num
 * @property integer $like
 * @property integer $dislike
 * @property integer $status
 * @property double $deleted
 * @property integer $deletedby
 * @property string $deletedon
 * @property integer $editedby
 * @property string $editedon
 * @property string $name
 * @property string $introtext
 * @property string $content
 * @property string $image
 */
class Comments extends \yii\db\ActiveRecord
{
    /** Status banned */
    const STATUS_BANNED = 0;
    /** Status active */
    const STATUS_ACTIVE = 1;
    /** Status deleted */
    const STATUS_DELETED = 2;
   


    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $this->init();
        return [
//            [['content'], 'required'],
            [['id', 'table_id', 'parent_id', 'createdby', 'rate_num', 'like', 'dislike', 'status', 'deletedby', 'editedby'], 'integer'],
            [['parent', 'rate', 'deleted'], 'number'],
            [['createdon', 'deletedon', 'editedon'], 'safe'],
            [['introtext', 'content'], 'string'],
            [['table_name', 'name', 'image'], 'string', 'max' => 255],
            ['createdon', 'default', 'value' => date('Y-m-d H:i:s', time())],
            ['createdby', 'default', 'value' => \Yii::$app->user->getId()],
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
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'rate' => 'Rate',
            'rate_num' => 'Rate Num',
            'like' => 'Like',
            'dislike' => 'Dislike',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'deletedby' => 'Deletedby',
            'deletedon' => 'Deletedon',
            'editedby' => 'Editedby',
            'editedon' => 'Editedon',
            'name' => 'Name',
            'introtext' => 'Introtext',
            'content' => 'Комментарий',
            'image' => 'Image',
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
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'rate' => 'Rate',
            'rate_num' => 'Rate Num',
            'like' => 'Like',
            'dislike' => 'Dislike',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'deletedby' => 'Deletedby',
            'deletedon' => 'Deletedon',
            'editedby' => 'Editedby',
            'editedon' => 'Editedon',
            'name' => 'Name',
            'introtext' => 'Introtext',
            'content' => 'Комментарий',
            'image' => 'Image',
        ];
    }    
}
