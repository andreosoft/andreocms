<?php

namespace common\modules\users\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $fullname
 * @property string $phone
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $website
 * @property string $skype
 * @property string $image
 * @property string $geopoint
 */
class UserProfile extends \yii\db\ActiveRecord
{
    const USER_TYPE_PRIVATE = 'частное лицо';
    const USER_TYPE_ORG = 'организация';
    const USER_TYPE_SHOP = 'магазин';
    
    public $file;
    
    public static function tableName()
    {
        return '{{%users_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['address', 'about'], 'string'],
            [['geopoint_latitude', 'geopoint_longitude'], 'string'],
            [['fullname', 'phone', 'country', 'city', 'state', 'zip', 'website', 'skype', 'image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
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
            'fullname' => 'Полное имя',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'country' => 'Страна',
            'city' => 'Город',
            'state' => 'Регион',
            'zip' => 'Индекс',
            'website' => 'Website',
            'skype' => 'Skype',
            'image' => 'Фото',
            'about' => 'Описание',
            'type' => 'Кого вы представляете',
            'workingtime' => 'Время работы',
            'geopoint_latitude' => 'Широта',
            'geopoint_longitude' => 'Долгота',            
        ];
    }
        
    public function attributeHints()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Полное имя',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'country' => 'Страна',
            'city' => 'Город',
            'state' => 'Регион',
            'zip' => 'Индекс',
            'website' => 'Website',
            'skype' => 'Skype',
            'image' => 'Фото',
            'about' => 'Описание',
            'type' => 'Кого вы представляете',
            'workingtime' => 'Время работы',
            'geopoint_latitude' => 'Широта',
            'geopoint_longitude' => 'Долгота',            
        ];
    }
    
    public static function getProfile() {
        if ($model = UserProfile::findOne(['user_id' => \Yii::$app->user->getId()])) {
            return $model;
        } else {
            $model = new UserProfile();
            $model->user_id = \Yii::$app->user->getId();
            return $model;
        }
    }
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->inverseOf('profile');
    }
    
    public function getFullAdress() {
        $out = '';
        empty($this->country) ? : $out .= $this->country.'/n';
        empty($this->zip) ? : $out .= $this->zip.'/n';
        empty($this->state) ? : $out .= $this->state.'/n';
        empty($this->city) ? : $out .= $this->city.'/n';
        empty($this->address) ? : $out .= $this->address.'/n';
        return $out;
    }
    
    public function beforeSave($insert)
    {
        $this->updatedon = date('Y-m-d H:i:s', time());
        if (UserProfile::find()->count() < 30) {
            return true;
        }
        return false;
    }
         
}
