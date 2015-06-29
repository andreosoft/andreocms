<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\modules\filemanager\models\File;
use common\modules\content\models\Content;
use common\modules\catalog\models\CatalogProducts;

$this->title = Yii::$app->name;
?>

<?= $this->render('//common/carusel') ?>

<!-- Описание компании и услуг -->
<section class="pt-medium pb-medium">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 mb-medium text-center heading">
                <h1>Milon Construction - промышленое строительство</h1>
                <p>
                    Все работы по строительству в производстве выполняются нашими специалистами на основе имеющихся разрешений, сертификатов и лицензий, которые отвечают современным нормам и стандартам качества. Мы долговременно и плодотворно сотрудничаем с солидными поставщиками, получая качественные строительные материалы, изделия и технику, позволяя избежать ввоза на стройплощадки компании контрафактной продукции.
                </p>
            </div>
            <div class="row">
            <?php foreach (Content::findAll(['class' => 'uslugy', 'status' => Content::STATUS_PUBLISHED]) as $model): ?>
                <div class="col-sm-6 col-md-4">
                    <article class="box-icon">
                        <a href="<?= Url::to(['/content/site/view-by-url', 'url' => $model->seo_url, 'view' => 'view_uslugy'])?>">
                            <i class="icon-heart medium circle"></i>
                            <h3><?= $model->name ?></h3>
                            <p><?= $model->introtext ?></p>
                        </a>
                    </article>
                </div>

            <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>
<!-- / Описание компании и услуг -->


<!-- team -->
<section id="team" class="pt-medium pb-medium light-color">

    <div class="container">
        <div class="row"> 

            <div class="col-md-12 mb-medium text-center heading">
                <h1>Milon Construction - с нами выгодно работать</h1>
                <p>
                    Компания ООО «АльфаСтрой» специализируется на выполнении строительных работ любой степени сложности. Мы ориентируемся на безупречное качество, индивидуальный подход и приемлемые цены. Строительство промышленных зданий представляет собой динамично развивающуюся отрасль, которая широко шагнула вперёд и сумела обогнать множество других видов строительства. Такое положение дел привело к внедрению инновационных технологий, в итоге стали использоваться не только новые материалы, но и современные методики строительства.
                </p>
            </div>

            <section class="col-md-12">

                <div class="row">
                    <?php foreach (CatalogProducts::find()->where(['status' => Content::STATUS_PUBLISHED])->orderBy('RAND()')->limit(4)->all() as $model): ?>
                    <div class="col-sm-6 col-md-3" style="padding: 3px 5px 3px 5px;">
                        <article class="item box padding-small">
                            <figure>
                                <div>
                                    <?= Html::img(File::thumb($model->image, 249, 249), ['class' => 'full-width'])?>
                                </div>
                                <figcaption>
                                    <h3><?= $model->name ?></h3>
                                    <p class="small">
                                        <?= $model->introtext ?>
                                    </p>
                                    <?= Html::a('Подробнее', ['/catalog/site/view-by-url', 'url' => $model->seo_url], ['class' => 'btn default x-small'])?>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <?php endforeach;?>
                </div>
            </section>

        </div>
    </div>
</section>
<!-- / team -->

<!-- call to action -->
<section id="shareProject" class="pt-medium pb-medium dark-main-color">
    <div class="container">
        <div class="row"> 

            <div class="col-md-12 text-center"  data-nekoanim="fadeInUp" >
                <h1>Какой-нибудь очень очень крутой слоган.</h1>
                <p class="lead">
                    Мы работаем для Вас!
                </p>
            </div>

        </div>
    </div>

</section>
<!-- /call to action -->