<?php

use yii\helpers\Html;
?>

<!-- Foter -->
<footer class="small-section bg-gray-lighter footer pb-60">
    <div class="container">

        <!-- Footer Logo -->
        <div class="local-scroll mb-30" data-wow-duration="1.5s">
            <a href="#top"><img src="<?= \Yii::$app->assetManager->publish('@common/themes/samidel/assets/images/imgo.png')[1]?>" width="150" height="60" alt="" />
            </a>
        </div>
        <!-- End Footer Logo -->

        <!-- Social Links -->
        <div class="footer-social-links mb-110 mb-xs-60">
            <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
            <a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
        </div>
        <!-- End Social Links -->

        <!-- Footer Text -->
        <div class="footer-text">

            <!-- Copyright -->
            <div class="footer-copy font-alt">
                <a href="<?= \Yii::$app->homeUrl?>" target="_blank">&copy; SAMIDEL`</a>.
            </div>
            <!-- End Copyright -->

            <div class="footer-made">
                Разработка сайта: PxDesign<br>
                Работает на платформе andreo cms
            </div>

        </div>
        <!-- End Footer Text -->

    </div>


    <!-- Top Link -->
    <div class="local-scroll">
        <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
    </div>
    <!-- End Top Link -->

</footer>
<!-- End Foter -->