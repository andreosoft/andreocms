<?php

namespace common\modules\catalog\models;

use Yii;
use common\modules\users\models\User;
use yii\web\NotFoundHttpException;
/**
 * This is the model class for table "catalog_products".
 *
 * @property integer $id
 * @property string $name
 * @property string $introtext
 * @property string $content
 * @property string $description
 * @property integer $parent
 * @property string $image
 * @property integer $createdby
 * @property string $createdon
 * @property integer $deleted

 *
 * @property CatalogProducts $parent0
 * @property CatalogProducts[] $CatalogProductss
 */
class CatalogProducts extends \yii\db\ActiveRecord {

    const STATUS_NOT_PUBLISHED = 0;
    const STATUS_PUBLISHED = 1;  
    const STATUS_DELETED = 2; 
    
    public static function tableName() {
        return 'catalog_products';
    }

    public function rules() {
        return [
            [['name'], 'required'],
            [['introtext', 'content', 'description', 'tag', 'seo_description'], 'string'],
            [['parent', 'isparent', 'createdby', 'updatedby', 'status', 'publishedby', 'updatedby', 'sellout', 'views',
                'discont', 'sellout', 'promo', 'like', 'rating', 'rating_num', 'sort'], 'integer'],
            [['price', 'price_d'], 'number'],
            [['createdon', 'publishedon', 'updatedon'], 'safe'],
            [['createdondate', 'createdontime', 'publishedondate', 'publishedontime'], 'safe'],
            [['name', 'fullname', 'image', 'seo_url', 'seo_title', 'seo_keyword'], 'string', 'max' => 255],
            ['price', 'default', 'value' => 0],
            ['price_d', 'default', 'value' => 0],
            ['sort', 'default', 'value' => 0],
            ['createdby', 'default', 'value' => \Yii::$app->user->getId()],
            ['createdon', 'default', 'value' => date('Y-m-d H:i:s', time())],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => \Yii::t('catalog/main', 'ID'),
            'name' => \Yii::t('catalog/main', 'Name'),
            'introtext' => \Yii::t('catalog/main', 'Introtext'),
            'price' => \Yii::t('catalog/main', 'Цена'),
            'price_d' => \Yii::t('catalog/main', 'Цена со скидкой'),
            'description' => \Yii::t('catalog/main', 'Описание'),
            'content' => \Yii::t('catalog/main', 'Содержимое'),
            'parent' => \Yii::t('catalog/main', 'Parent'),
            'image' => \Yii::t('catalog/main', 'Image'),
            'createdby' => \Yii::t('catalog/main', 'Createdby'),
            'createdon' => \Yii::t('catalog/main', 'Createdon'),
            'createdondate' => \Yii::t('catalog/main', 'Createdondate'),
            'createdontime' => \Yii::t('catalog/main', 'Createdontime'),
            'status' => \Yii::t('catalog/main', 'Статус'),
            'publishedondate' => \Yii::t('catalog/main', 'Date Publishedon'),
            'publishedontime' => \Yii::t('catalog/main', 'Time Publishedon'),            
        ];
    }
    
    public function attributeHints() {
        return [
            'id' => \Yii::t('catalog/main', 'ID'),
            'name' => \Yii::t('catalog/main', 'Name'),
            'introtext' => \Yii::t('catalog/main', 'Introtext'),
            'price' => \Yii::t('catalog/main', 'Цена'),
            'price_d' => \Yii::t('catalog/main', 'Цена со скидкой'),
            'description' => \Yii::t('catalog/main', 'Описание'),
            'content' => \Yii::t('catalog/main', 'Содержимое'),
            'parent' => \Yii::t('catalog/main', 'Parent'),
            'image' => \Yii::t('catalog/main', 'Main image'),
            'createdby' => \Yii::t('catalog/main', 'Createdby'),
            'createdon' => \Yii::t('catalog/main', 'Createdon'),
            'createdondate' => \Yii::t('catalog/main', 'Createdondate'),
            'createdontime' => \Yii::t('catalog/main', 'Createdontime'),
            'status' => \Yii::t('catalog/main', 'Статус'),
            'publishedondate' => \Yii::t('catalog/main', 'Date Publishedon'),
            'publishedontime' => \Yii::t('catalog/main', 'Time Publishedon'),   
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0() {
        return $this->hasOne(CatalogProducts::className(), ['id' => 'parent']);
    }

    public function getCatalogCategory() {
        return $this->hasOne(CatalogCategorys::className(), ['id' => 'category'])->inverseOf('catalogProducts');
    }

    public function getCreated() {
        return $this->hasOne(User::className(), ['id' => 'createdby']);
    }    

    public function getCatalogProductss() {
        return $this->hasMany(CatalogProducts::className(), ['parent' => 'id']);
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
        $this->createdon = explode(' ', $this->publishcreatedonedon)[0] . ' ' . $v;
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
    
    public function updateViews() {
        return $this->updateCounters(['views' => 1]);
    }

    public function findModel($id) {
        if (($model = CatalogProducts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
        
    public function getFullname() {
        return $this->findFullName($this, $this->name);
    } 
    
    private function findFullName($model, $name) {
        
        if ($model->parent != 0) {
            $parent = CatalogProducts::findOne($model->parent);
            $name = $this->findFullName($parent, $parent->name.' > '.$name);
            
        }
        return $name;       
    }
        
    public static function getStatusArray()
    {
        return [
            self::STATUS_PUBLISHED => \Yii::t('catalog/main', 'Published'),
            self::STATUS_NOT_PUBLISHED => \Yii::t('catalog/main', 'Not Published'),
            self::STATUS_DELETED => \Yii::t('catalog/main', 'Deleted'),
        ];
    }
    
    public function beforeSave($insert) {
//        $this->createdon = date('Y-m-d H:i:s', time());
//        if (CatalogProducts::find()->count() < 30) {
//            return true;
//        }
        return true;
    }
}
