<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/assets/css/home.css" />
<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="slider-image" style="background-image: url(<?= Yii::$app->request->baseUrl ?>/assets/images/Roadmap-1.jpg);"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="carousel-title">نقدم الإستشارات التسويقية</h2>
                    <p class="carousel-desc">الدراسات - البحوث - الإحصاءات</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slider-image" style="background-image: url(<?= Yii::$app->request->baseUrl ?>/assets/images/Roadmap.jpg);"></div>
                <div class="carousel-caption">
                    <h2 class="carousel-title">نقدم الإستشارات التسويقية</h2>
                    <p class="carousel-desc">الدراسات - البحوث - الإحصاءات</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="slider-image" style="background-image: url(<?= Yii::$app->request->baseUrl ?>/assets/images/teamwork.jpg);"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="carousel-title">نقدم الإستشارات التسويقية</h2>
                    <p class="carousel-desc">الدراسات - البحوث - الإحصاءات</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div id="aboutUs" class="container">
        <div class="row about-us">
            <div class="col-md-4 col-12">
                <img src="assets/images/Business-1.png" style="width: 100%;" />
            </div>
            <div class="col-md-8 col-12">
                <div class="about-us-title">
                    من نحن
                </div>
                <div class="about-us-orgname">
                    الجمعية التعاونية لتأهيل وتطوير الكوادر الوطنية
                </div>
                <div class="about-us-desc">
                    تعتبر الجمعية التعاونية إحدى المؤسسات التنموية التي تسهم في تحقيق التنمية المستدامة
                    اقتصادياً واجتماعيا،
                    على أساس تطوير وتنمية أفراد المجتمع المحلي في المجالات التقنية والمهنية والأغراض التنموية المتعددة.
                </div>
                <!-- <div class="about-us-desc">
                • إقامة وتبني الدورات الفنية والمهنية والمحاضرات وورش العمل التعاونية والبرامج البحثية وتقديمها لأفراد
                المجتمع من قبل المختصين من الأعضاء في الجمعية.
            </div>
            <div class="about-us-desc">
                •	تجهيز الصالات والقاعات حسب احتياج التدريب في سوق العمل بأسعار تنافسية.
            </div>
            <div class="about-us-desc">
                •	دعم وتحفيز مفهوم التدريب التعاوني والتدريب الإنتاجي.
            </div> -->
            </div>
        </div>
    </div>

    <div id="activity" class="activity">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 ">
                    <div class="activity-title">
                        أنشطة الجمعية
                    </div>
                </div>
            </div>
            <div class="row activity-body">
                <div class="col-3">
                    <div class="activity-icon">
                        <img src="assets/images/icon.svg" width="100%" />
                    </div>
                    <div>
                        الأبحاث والدراسات 
                    </div>
                </div>
                <div class="col-3">
                    <div class="activity-icon">
                        <img src="assets/images/icon.svg" width="100%" />
                    </div>
                    <div>
                        التوعية والتثقيف
                    </div>
                </div>
                <div class="col-3">
                    <div class="activity-icon">
                        <img src="assets/images/icon.svg" width="100%" />
                    </div>
                    <div>
                        التأهيل والتدريب
                    </div>
                </div>
                <div class="col-3">
                    <div class="activity-icon">
                        <img src="assets/images/icon.svg" width="100%" />
                    </div>
                    <div>
                        الفعاليات
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- <div id="board" class="board">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 ">
                    <div class="activity-title">
                        أعضاء مجلس الإدارة
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6 text-center">
                    <div class="mb-2">
                        <img src="assets/images/default.png" alt="" class="board-img">
                    </div>
                    <div class="mb-2">
                        <strong>
                            عبدالله الهدلق
                        </strong>
                    </div>
                    <div>
                        رئيس مجلس الإدارة
                    </div>
                </div>
                <div class="col-6 text-center">
                    <div class="mb-2">
                        <img src="assets/images/default.png" alt="" class="board-img">
                    </div>
                    <div class="mb-2">
                        <strong>
                            صالح الجعيلان
                        </strong>
                    </div>
                    <div>
                        نائب رئيس مجلس الإدارة
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-center">
                    <div class="mb-2">
                        <img src="assets/images/default.png" alt="" class="board-img">
                    </div>
                    <div class="mb-2">
                        <strong>
                            عبده أزيبي
                        </strong>
                    </div>
                    <div>
                        المشرف المالي
                    </div>
                    <div>
                        عضو مجلس إدارة
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="mb-2">
                        <img src="assets/images/default.png" alt="" class="board-img">
                    </div>
                    <div class="mb-2">
                        <strong>
                            يحي أزيبي
                        </strong>
                    </div>
                    <div>
                        عضو مجلس إدارة
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="mb-2">
                        <img src="assets/images/default.png" alt="" class="board-img">
                    </div>
                    <div class="mb-2">
                        <strong>
                            عبدالرحمن الرشيد
                        </strong>
                    </div>
                    <div>
                        عضو مجلس إدارة
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div id="contactUs" class="container">
        <div class="row about-us">
            <div class="col">
                <div class="about-us-title">
                    اتصل بنا
                </div>
                <div class="about-us-orgname">
                    الجمعية التعاونية لتأهيل وتطوير الكوادر الوطنية
                </div>
                <div class="about-us-desc mb-4">
                    الرياض - حي المربع - طريق الملك سعود
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-envelope contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>البريد الإلكتروني</strong>
                                </div>
                                <a href="mailto:server@sds-sa.net">info@qadnc.org.sa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-phone-alt contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>الجوال</strong>
                                </div>
                                <a href="tel:0504792206" dir="ltr">00966 504792206</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-left">
                <img src="assets/images/contact-us.png" />
            </div>
        </div>
    </div>
</div>
<script src="<?= Yii::$app->request->baseUrl ?>/assets/js/bootstrap.bundle.min.js"></script>