<?php

use app\models\User;use yii\helpers\Html;

?>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#"><?=  Yii::$app->user->identity->first_name ?></a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header profile">
            <div class="user-pic">

                <?= Html::img('https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg', ['class' => 'img-responsive img-rounded']) ?>
            </div>
            <div class="user-info">
          <span class="user-name">
            <strong><?=  Yii::$app->user->identity->first_name ?></strong>
          </span>
                <span class="user-role"><?='مدير النظام'?></span>
                <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>متصل</span>
          </span>
            </div>
        </div>


        <div class="sidebar-menu">
            <ul>


                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span><?=Yii::t('app','Home')?></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li  class="menu-item <?= Yii::$app->controller->route =='slider/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','سلايدر'), ['slider/index'])?>
                            </li>
                            <li  class="menu-item <?= Yii::$app->controller->route =='about/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','من نحن'), ['slider/index'])?>
                            </li>
                            <li  class="menu-item <?= Yii::$app->controller->route =='about/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','معلومات التواصل'), ['slider/index'])?>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span><?=Yii::t('app','Users')?></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>

                            <li  class="menu-item <?= Yii::$app->controller->route =='about/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','مجلس الاداره'), ['slider/index'])?>
                            </li>


                            <li  class="menu-item <?= Yii::$app->controller->route =='students/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Students'), ['students/index'])?>
                            </li>


                            <li  class="menu-item <?= Yii::$app->controller->route =='members/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Members'), ['members/index'])?>
                            </li>


                        </ul>
                    </div>
                </li>




                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span><?=Yii::t('app','Courses')?></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>

                            <li  class="menu-item <?= Yii::$app->controller->route =='courses/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Courses'), ['courses/index'])?>
                            </li>
                            <li  class="menu-item <?= Yii::$app->controller->route =='categories/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Categories'), ['categories/index'])?>
                            </li>

                            <li  class="menu-item <?= Yii::$app->controller->route =='student-courses/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Student_Courses'), ['student-courses/index'])?>
                            </li>


                        </ul>
                    </div>
                </li>





                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span><?=Yii::t('app','المزيد')?></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>

                            <li  class="menu-item <?= Yii::$app->controller->route =='achievements/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Achievements'), ['achievements/index'])?>
                            </li>
                            <li  class="menu-item <?= Yii::$app->controller->route =='consultation/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Consultation'), ['consultation/index'])?>
                            </li>

                            <li  class="menu-item <?= Yii::$app->controller->route =='pages/index'?'active':''?>">
                                <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Pages'), ['pages/index'])?>
                            </li>


                        </ul>
                    </div>
                </li>





            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <a href="#">
            <?=
            Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton('تسجيل خروج',["class"=>"logout"]

            )
            . Html::endForm()
            ?>

        </a>
    </div>
</nav>