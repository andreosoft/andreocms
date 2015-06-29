<?php

namespace common\modules\content\models;


use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $template
 * @property string $introtext
 * @property string $content
 * @property integer $views
 * @property integer $like
 * @property integer $rating
 * @property integer $rating_num
 * @property string $tag
 * @property integer $status
 * @property string $publishedon
 * @property integer $publishedby
 * @property integer $deleted
 * @property string $deletedon
 * @property integer $deletedby
 * @property string $image
 * @property integer $createdby
 * @property string $createdon
 * @property integer $updatedby
 * @property string $updatedon
 */
class Content extends \yii\db\ActiveRecord {

    const STATUS_NOT_PUBLISHED = 0;
    const STATUS_PUBLISHED = 1;  
    const STATUS_DELETED = 2; 

    public function behaviors() {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            ['class', 'string', 'max' => 16],
            ['template', 'string', 'max' => 255],
            [['seo_description', 'seo_keyword'], 'string'],
            [['seo_url', 'seo_title', 'seo_keyword'], 'string', 'max' => 255],
            [['introtext', 'content', 'tag', 'image'], 'string'],
            [['parent', 'isparent'], 'integer'],
            [['views', 'like', 'rating', 'rating_num', 'status', 'publishedby', 'createdby', 'updatedby'], 'integer'],
            [['publishedon', 'createdon', 'updatedon'], 'safe'],
            [['publishedondate', 'publishedontime'], 'safe'],  
            [['createdondate', 'createdontime'], 'safe'], 
            [['updatedondate', 'updatedontime'], 'safe'], 
            [['image'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            ['createdon', 'default', 'value' => date('Y-m-d H:i:s', time())],
            ['createdby', 'default', 'value' => \Yii::$app->user->getId()],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => \Yii::t('content/main', 'ID'),
            'class' => \Yii::t('content/main', 'Class'),
            'name' => \Yii::t('content/main', 'Name'),
            'parent' => \Yii::t('content/main', 'Parent'),
            'isparent' => \Yii::t('content/main', 'Is Parent?'),            
            'seo_url' => \Yii::t('content/main', 'Seo url'),
            'seo_title' => \Yii::t('content/main', 'Seo Title'),
            'seo_description' => \Yii::t('content/main', 'Seo Description'),
            'seo_keyword' => \Yii::t('content/main', 'Seo keyword'),
            'template' => \Yii::t('content/main', 'Template'),
            'introtext' => \Yii::t('content/main', 'Introtext'),
            'content' => \Yii::t('content/main', 'Content'),
            'views' => \Yii::t('content/main', 'Views'),
            'like' => \Yii::t('content/main', 'Like'),
            'rating' => \Yii::t('content/main', 'Rating'),
            'rating_num' => \Yii::t('content/main', 'Rating Num'),
            'tag' => \Yii::t('content/main', 'Tag'),
            'status' => \Yii::t('content/main', 'Status'),
            'publishedon' => \Yii::t('content/main', 'Publishedon'),
            'publishedondate' => \Yii::t('content/main', 'Date Publishedon'),
            'publishedontime' => \Yii::t('content/main', 'Time Publishedon'),
            'publishedby' => \Yii::t('content/main', 'Publishedby'),
            'image' => \Yii::t('content/main', 'Image'),
            'createdby' => \Yii::t('content/main', 'Createdby'),
            'createdon' => \Yii::t('content/main', 'Createdon'),
            'updatedby' => \Yii::t('content/main', 'Updatedby'),
            'updatedon' => \Yii::t('content/main', 'Updatedon'),
        ];
    }
    
    public function attributeHints() {
        return [
            'name' => \Yii::t('content/main', 'System name'),
            'alias' => 'Alias',
            'template' => 'Template',
            'introtext' => 'Introtext',
            'content' => 'Content',
            'views' => 'Views',
            'like' => 'Like',
            'rating' => 'Rating',
            'rating_num' => 'Rating Num',
            'tag' => 'Tag',
            'status' => 'Status',
            'publishedon' => 'Publishedon',
            'publishedby' => 'Publishedby',
            'image' => 'Image',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'updatedby' => 'Updatedby',
            'updatedon' => 'Updatedon',
        ];
    }
   
    public function getPublishedondate() {
        return explode(' ', $this->publishedon)[0];
    }
    
    public function setPublishedondate($v) {
       $this->publishedon = $v . ' ' . explode(' ', $this->publishedon)[1];
    }    
    
    public function getPublishedontime() {
        return explode(' ', $this->publishedon)[1];
    }
    
    public function setPublishedontime($v) {
        $this->publishedon = explode(' ', $this->publishedon)[0] . ' ' . $v;
    }    
    
    public function getCreatedondate() {
        return explode(' ', $this->createdon)[0];
    }
    
    public function setCreatedondate($v) {
       $this->createdon = $v . ' ' . explode(' ', $this->createdon)[1];
    }    
    
    public function getCreatedontime() {
        return explode(' ', $this->createdon)[1];
    }
    
    public function setCreatedontime($v) {
        $this->createdon = explode(' ', $this->createdon)[0] . ' ' . $v;
    }   
   
    public function getUpdatedondate() {
        return explode(' ', $this->updatedon)[0];
    }
    
    public function setUpdatedondate($v) {
       $this->publiupdatedonshedon = $v . ' ' . explode(' ', $this->updatedon)[1];
    }    
    
    public function getUpdatedontime() {
        return explode(' ', $this->updatedon)[1];
    }
    
    public function setUpdatedontime($v) {
        $this->updatedon = explode(' ', $this->updatedon)[0] . ' ' . $v;
    }   
    
    public static function getStatusArray()
    {
        return [
            self::STATUS_PUBLISHED => \Yii::t('content/main', 'Published'),
            self::STATUS_NOT_PUBLISHED => \Yii::t('content/main', 'Not Published'),
            self::STATUS_DELETED => \Yii::t('content/main', 'Deleted'),
        ];
    }
}
