<?php

use app\models\User;
use yii\helpers\Html;

?>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">

            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header profile" type="">
            <div class="user-pic">

            </div>
            <div class="user-info">
          <span class="user-name">
            <strong>dsds</strong>
          </span>

                <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>متصل</span>
          </span>
            </div>
        </div>


        <div class="sidebar-menu">
            <ul>

                <li>
                    <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Coures'), ['products/index'])?>
                </li>
                <li>
                    <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Coures'), ['products/index'])?>
                </li>
                <li>
                    <?= Html::a('<i class="fab fa-product-hunt"></i>'.Yii::t('app','Coures'), ['products/index'])?>
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
            . Html::submitButton('',["class"=>"btn-danger fa fa-power-off"]

            )
            . Html::endForm()
            ?>

        </a>
    </div>
</nav>