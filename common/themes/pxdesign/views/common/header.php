<?php
use yii\helpers\Html;
?>

<!-- Main Menu -->
<nav class="navbar navbar-fixed-top animated fadeInDown delay1">
    <div class="navbar-inner">
        <div class="container">
            <div class="wrapp">

                <!--Mobile Main Menu-->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--Mobile Main Menu-->

                <!--Desktop Main Menu-->
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><?= Html::a('Главная', \Yii::$app->homeUrl)?></li>
                        <!--<li><a href="#">О Нас</a></li> -->
                        <li><?= Html::a('Наши услуги',['/content/frontend/view-by-url', 'url' => 'Наши_услуги'])?></li>
                        <li><?= Html::a('Портфолио',['/content/frontend/index', 'class' => 'portfolio'])?></a></li>
                        <li><?= Html::a('Контакты',['/content/frontend/view-by-url', 'url' => 'Контакты'])?></li>
                        <li><a data-toggle="modal" href="#myModal">Заказать расчет</a></li>
                    </ul>
                </div>
                <!--End Desktop Main Menu-->

            </div>    
        </div><!--/.container -->
    </div><!--/.nav-inner -->
</nav>
<!-- End Main Menu -->

<!-- Contact Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Оставить заявку на расчет рекламы.</h3>
    </div>
    <div class="modal-body">
        <!-- Form -->
        <form id="form" class="form_online" action="http://context.kg/send.php">
            <label class="no">Name</label>
            <input type="text" placeholder="Как к Вам обращаться?" name="name" required="">
            <label class="no">Email</label>
            <input type="email" placeholder="Ваш e-mail." name="email" required="">
            <label class="no">Message</label>
            <textarea placeholder="Адрес Вашего сайта. Если нет сайта, то коротко опишите Ваш вид деятельности. Мы подготовим для Вас коммерческое предложение и вышлем на указанный Вами e-mail." name="message" required=""></textarea>
            <input type="submit" name="Submit" value="Отправить" class="send">
        </form>
        <!-- Form -->
    </div>
    <div class="modal-footer"></div>
</div>