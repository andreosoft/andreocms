<?php

namespace common\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "catalog_categorys".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property integer $isparent
 */
class CatalogCategorys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_categorys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'parent', 'isparent'], 'integer'],
            [['name', 'fullname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent' => 'Parent',
            'isparent' => 'Isparent',
        ];
    }
    
    public function getFullname() {
        return $this->findFullName($this, $this->name);
    } 
    
    private function findFullName($model, $name) {
        
        if ($model->parent != 0) {
            $parent = CatalogCategorys::findOne($model->parent );
            $name = $this->findFullName($parent, $parent->name.' > '.$name);
            
        }
        return $name;       
    }

    public function getCatalogProducts() {
        return $this->hasOne(CatalogProducts::className(), ['category' => 'id'])->inverseOf('catalog_categorys');
    }
}
