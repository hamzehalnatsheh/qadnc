<?php
use yii\helpers\Html;
?>
<div id="header" >
    <div id="siteMobile" class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <a href="javascript:MyFunction();" class="site-mobile-menu-close menu-icon mt-3 text-dark" onclick="closeMobileMenu()">
                <i class="fas fa-times"></i>
            </a>
        </div>
        <div class="site-mobile-menu-body">
            <ul class="site-nav-wrap">
                <li class="active"><a href="<?= Yii::$app->request->baseUrl?>/"><span>الرئيسية</span></a></li>
                <li><a href="/#aboutUs"><span>من نحن</span></a></li>
                <li><a href="/#activity"><span>أنشطة الجمعية</span></a></li>
                <li><a href="/#contactUs"><span>اتصل بنا</span></a></li>
                <li><a href="/site/board"><span>مجلس الادارة</span></a></li>
                <li><a href="/site/courses"><span>الدورات</span></a></li>
                <li><a href="/site/consulting"><span>الاستشارات</span></a></li>
                <?php if (Yii::$app->user->isGuest) :?>
                    <li><a href="<?= Yii::$app->request->baseUrl?>/site/login"><span>تسجيل دخول</span></a></li>
                <?php else:?>
                    <?php  echo '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            ' تسجيل الخروج (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . \yii\helpers\Html::endForm()
                        . '</li>';?>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-xl-2">
                    <h1 class="mb-0 site-logo">
                        <a href="<?= Yii::$app->request->baseUrl?>/" class="text-black mb-0">
                            <img src="<?= Yii::$app->request->baseUrl?>/assets/images/dark-logo.png" alt="qadnc logo" class="site-logo" />
                        </a>
                    </h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block text-left">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active"><a href="/"><span>الرئيسية</span></a></li>
                            <li class="has-children">
                                <a>
                                    <span>
                                        عن الجمعية
                                        <i class="fas fa-angle-down icon-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="/#aboutUs">من نحن</a></li>
                                    <li><a href="/#activity">أنشطة الجمعية</a></li>
                                    <li><a href="/#contactUs">اتصل بنا</a></li>
                                </ul>
                            </li>
                            <li><a href="/site/board"><span>مجلس الادارة</span></a></li>
                            <li><a href="/site/courses"><span>الدورات</span></a></li>
                            <li><a href="/site/consulting"><span>الاستشارات</span></a></li>

                            <?php if (Yii::$app->user->isGuest) :?>
                                <li><a href="<?= Yii::$app->request->baseUrl?>/site/login"><span>تسجيل دخول</span></a></li>
                            <?php else:?>

                              <?php  echo '<li>'
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                    ' تسجيل الخروج (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link logout']
                                    )
                                    . \yii\helpers\Html::endForm()
                                    . '</li>';?>




                            <?php endif;?>

                        </ul>
                    </nav>
                </div>
                <div class="col menu-icon text-left d-xl-none">
                    <a href="javascript:MyFunction();" class="text-dark" onclick="openMobileMenu()">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>