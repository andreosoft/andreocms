<?php
namespace common\modules\filemanager\models;

use common\modules\filemanager\lib\Image;
use yii\helpers\Url;

class File extends \yii\base\Model {

    public $file;
    public $content;
    public $path;



    public function rules() {
        return [
//            [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png', 'maxFiles' => 50],
            [['file'], 'file', 'maxFiles' => 50],
            [['path'], 'string'],
            [['content'], 'string'],
        ];
    }
    
    public function attributeHints() {
        return [];
    }
    
    public function getContent() {
        return $this->content = file_get_contents($this->path);
    }
    
    public function setContent() {
        return file_put_contents($this->path, $this->content);       
    }

    public function loadContent() {
      return $this->content = file_get_contents($this->path);
    }
    
    public function saveContent() {
        return file_put_contents($this->path, $this->content);       
    }
}
