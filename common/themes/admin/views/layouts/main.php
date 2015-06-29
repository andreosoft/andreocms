<?php

/**
 * Theme main layout.
 *
 * @var \yii\web\View $this View
 * @var string $content Content
 */

use common\themes\admin\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use andreosoft\image\Image;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <?= $this->render('//layouts/head') ?>
    </head>
    <body class="skin-red">
        <div class="wrapper">
    <?php $this->beginBody(); ?>
            <?= $this->render('//layouts/header') ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <?php if (Yii::$app->user->identity->profile->image) : ?>
                            <div class="pull-left image">
                                <?= Html::img(Image::thumb(\Yii::$app->user->identity->profile->image, 100, 100), ['class' => 'img-circle', 'alt' => Yii::$app->user->identity->username]) ?>
                            </div>
                        <?php endif; ?> 
                        <div class="pull-left info">
                            <p>
                                <?= Yii::t('theme/admin', 'Hello, {name}', ['name' => \Yii::$app->user->identity->profile->fullname]) ?>
                            </p>
                            <a>
                                <i class="fa fa-circle text-success"></i><?= Yii::t('theme/admin', 'Online') ?>
                            </a>
                        </div>
                    </div> 
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?= $this->render('//layouts/sidebar-menu') ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $this->title ?>
                        <?php if (isset($this->params['subtitle'])) : ?>
                            <small><?= $this->params['subtitle'] ?></small>
                        <?php endif; ?>
                    </h1> 
                    <?=  Breadcrumbs::widget(
                        [
                            'homeLink' => [
                                'label' => '<i class="fa fa-dashboard"></i> ' . Yii::t('theme/admin', 'Home'),
                                'url' => '/'
                            ],
                            'encodeLabels' => false,
                            'tag' => 'ol',
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
                        ]
                    ) ?>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?= Alert::widget(); ?>
                    <?= $content ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

    <?php $this->endBody(); ?>
        </div>
    </body>
</html>
<?php $this->endPage(); ?>