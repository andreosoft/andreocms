<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\googleMaps\googleMaps;

$this->title = 'Показать на карте';
$this->params['breadcrumbs'][] = ['label' => 'Иформация о продавце', 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBXwRImbmhV-UZ4Q_gYwml1H_14ViBExX8&sensor=FALSE "></script>
<script>
    function initialize() {
    var myLatlng = new google.maps.LatLng(<?= $model->geopoint_latitude ?>, <?= $model->geopoint_longitude ?>);
    var mapOptions = {
        zoom: 16,
        center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: '<?= $model->fullname ?>'
    });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map-canvas" style="width:100%; height:500px"></div>

