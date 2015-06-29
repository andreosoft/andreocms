<?php 
use yii\helpers\Html;
use andreosoft\image\Image;
?>
<header class="main-header">
    <?= Html::a(Yii::$app->name, Yii::$app->homeUrl, ['class' => 'logo']) ?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?= Yii::$app->user->identity->profile->fullname ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if (\Yii::$app->user->identity->profile->image) : ?>
                                <?= Html::img(Image::thumb(\Yii::$app->user->identity->profile->image, 100, 100), ['class' => 'img-circle', 'alt' => Yii::$app->user->identity->username]) ?>
                            <?php endif; ?>
                            <p>
                                <?= Yii::$app->user->identity->username ?> - <?= Yii::$app->user->identity->role ?>
                                <small><?= Yii::t('theme/admin', 'Member since') ?>: <?= Yii::$app->user->identity->createdon ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=
                                Html::a(
                                        'Profile', ['/users/backendprofile/view', 'id' => Yii::$app->user->identity->profile->id], ['class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                            <div class="pull-right">
                                <?=
                                Html::a(
                                        Yii::t('theme/admin', 'Sign out'), ['/users/backend/logout'], ['class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul> 
                </li>
            </ul>
        </div>
    </nav>
</header>