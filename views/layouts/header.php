
<div [ngClass]="{'offcanvas-menu': step}">
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close menu-icon mt-3" (click)="step = !step">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="site-mobile-menu-body">
            <ul class="site-nav-wrap">
                <li class="active"><a href="index.html"><span>الرئيسية</span></a></li>
                <li><a href="#aboutUs"><span>من نحن</span></a></li>
                <li><a href="#activity"><span>أنشطة الجمعية</span></a></li>
                <li><a href="#scrollMe"><span>مجلس الادارة</span></a></li>
                <li><a href="#contactUs"><span>اتصل بنا</span></a></li>
                <li><a href="/courses"><span>الدورات</span></a></li>
                <li><a href="/consulting"><span>الاستشارات</span></a></li>
                <li><a href="<?= Yii::$app->request->baseUrl?>/site/login"><span>تسجيل دخول</span></a></li>
            </ul>
        </div>
    </div>
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-xl-2">
                    <h1 class="mb-0 site-logo">
                        <a class="text-black mb-0">
                            <img src="assets/images/dark-logo.png" alt="qadnc logo" class="site-logo" />
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
                                    <li><a href="#aboutUs">من نحن</a></li>
                                    <li><a href="#activity">أنشطة الجمعية</a></li>
                                    <li><a href="#board">مجلس الادارة</a></li>
                                    <li><a href="#contactUs">اتصل بنا</a></li>
                                </ul>
                            </li>
                            <li><a href="/courses"><span>الدورات</span></a></li>
                            <li><a href="/consulting"><span>الاستشارات</span></a></li>
                            <li><a href="<?= Yii::$app->request->baseUrl?>/site/login"><span>تسجيل دخول</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col menu-icon text-left d-xl-none">
                    <a (click)="step = !step">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>