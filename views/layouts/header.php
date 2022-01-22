<?php

use yii\helpers\Html;
?>
<div id="header">
    <div id="siteMobile" class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <a href="javascript:MyFunction();" class="site-mobile-menu-close menu-icon mt-3 text-dark" onclick="closeMobileMenu()">
                <i class="fas fa-times"></i>
            </a>
        </div>
        <div class="site-mobile-menu-body">
            <ul class="site-nav-wrap">
                <li class="<?= Yii::$app->controller->route =='site/index'?'active':''?>">
                    <?=Html::a("<span>الرئيسية</span>",['site/index'])?>
                </li>


                <li><a href="/#aboutUs"><span>من نحن</span></a></li>
                <li><a href="/#activity"><span>أنشطة الجمعية</span></a></li>
                <li><a href="/#contactUs"><span>اتصل بنا</span></a></li>



                <li class="<?= Yii::$app->controller->route =='site/board'?'active':''?>">
                    <?=Html::a("<span>مجلس الادارة</span>",['site/board'])?>
                </li>

                <li class="<?= Yii::$app->controller->route =='site/courses'?'active':''?>">
                <?=Html::a("<span>الدورات</span>",['site/courses'])?>
                </li>

                <li class="<?= Yii::$app->controller->route =='site/consulting'?'active':''?>">
                <?=Html::a("<span>الاستشارات</span>",['site/consulting'])?>
                </li>

                <?php if (Yii::$app->user->isGuest) : ?>
                    <li class="<?= Yii::$app->controller->route =='site/login'?'active':''?>">
                         <?=Html::a("<span>تسجيل دخول</span>",['site/login'])?>
                    </li>

                <?php else : ?>
                    <?php echo '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            ' تسجيل الخروج (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . \yii\helpers\Html::endForm()
                        . '</li>'; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-xl-2">
                    <h1 class="mb-0 site-logo">
                        <a href="<?= Yii::$app->request->baseUrl ?>/" class="text-black mb-0">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/dark-logo.png" alt="qadnc logo" class="site-logo" />
                        </a>
                    </h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block text-left">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="<?= Yii::$app->controller->route =='site/consulting'?'active':''?>">
                                <?=Html::a("<span>الرئيسية</span>",['site/index'])?>
                            </li>

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

                            <li class="<?= Yii::$app->controller->route =='site/board'?'active':''?>">
                               <?=Html::a("<span>مجلس الادارة</span>",['site/board'])?>
                            </li>


                            <li class="<?= Yii::$app->controller->route =='site/courses'?'courses':''?>">
                                   <?=Html::a("<span>الدورات</span>",['site/courses'])?>
                            </li>
                            <li class="<?= Yii::$app->controller->route =='site/consulting'?'active':''?>">
                                <?=Html::a("<span>الاستشارات</span>",['site/consulting'])?>
                            </li>


                            <?php if (Yii::$app->user->isGuest) : ?>

                                <li class="<?= Yii::$app->controller->route =='site/login'?'active':''?>">
                                     <?=Html::a("<span>تسجيل دخول</span>",['site/login'])?>
                                </li>

                            <?php else : ?>

                                <li class="has-children">
                                    <a>
                                        <span>
                                        <img src="<?= Yii::$app->request->baseUrl ?>/images/default.png" alt="" class="header-profile-img">
                                            <?= Yii::$app->user->identity->username ?>
                                            <i class="fas fa-angle-down icon-down"></i>
                                        </span>
                                    </a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="/courses/index">الملف الشخصي</a></li>
                                        <?php if (Yii::$app->user->identity->type == \app\models\User::SUPER_ADMIN) : ?>
                                            <li><a href="<?= \yii\helpers\Url::to(['/courses/index']) ?>"><?= Yii::t('app','Courses')?></a></li>
                                        <?php endif;?>

                                        <?php echo '<li>'
                                            . Html::beginForm(['/site/logout'], 'post')
                                            . Html::submitButton(
                                                ' تسجيل الخروج ',
                                                ['class' => 'btn btn-link logout']
                                            )
                                            . \yii\helpers\Html::endForm()
                                            . '</li>'; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
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