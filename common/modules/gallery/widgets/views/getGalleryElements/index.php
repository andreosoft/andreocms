<?php
use yii\helpers\Url;
?>
<?php foreach ($elements as $element): ?>
    <a href="<?= Url::to( '@webuploads/' . str_replace('.jpg', '-thumb-300.jpg', $element->url), true)?>" ><img src="<?= Url::to('@webuploads/' . str_replace('.jpg', '-thumb-58.jpg', $element->url), true)?>" alt="" /></a>
<?php endforeach; ?>
