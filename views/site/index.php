<?php

/* @var $this yii\web\View */

$this->title = 'Application';
?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/home.css" />
<div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <?php foreach( $sliders as $key=> $slider):?>
                <?php $key ++ ;?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$key?>" class="<?= ($key==1)?'active':''?>" aria-current="true" aria-label="Slide <?=$key?>"></button>
               
            <?php endforeach;?>

        </div>
        <div class="carousel-inner">
            <?php foreach( $sliders as $key=> $slider):?>
                <?php $key ++ ;?>
                <div class="carousel-item <?= ($key==1)? 'active':''?>">
                    <div class="slider-image" style="background-image: url(<?= Yii::$app->request->baseUrl .'/'.$slider->image ?>);"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="carousel-title"><?= $slider->title?></h2>
                        <p class="carousel-desc"> <?= $slider->body?> </p>
                    </div>
                </div>
                
            <?php endforeach;?>
           
        
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
                <img src="<?= Yii::$app->request->baseUrl ?>/images/Business-1.png" style="width: 100%;" />
            </div>
            <div class="col-md-8 col-12">
                <div class="about-us-title">
                    من نحن
                </div>
                <div class="about-us-orgname">
                  <?= $about_us->title ?>
                </div>
                <div class="about-us-desc">
                    <?= $about_us->body ?>
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
                <?php foreach ($associations as $association):?>
                    <div class="col-3">
                        <div class="activity-icon">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/icon.svg" width="100%" />
                        </div>
                        <div>
                           <?=$association->name;?>
                        </div>
                    </div>

                <?php endforeach;?>



            </div>
        </div>
    </div>
    <div class="achievements">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 ">
                    <div class="activity-title">
                        إنجازات الجمعية
                    </div>
                </div>
            </div>
             
            <div class="center">
            <?php foreach($achievements as $achievement):?>
                <div>
                    <img src="<?=Yii::$app->request->baseUrl .'/'.$achievement->image?>">
                    <div class="achievements-title">
                       <?= $achievement->title?>
                    </div>
                </div>
                <div>

             <?php endforeach;?>  
              
            </div>
        </div>
    </div>
    <div id="contactUs" class="container">
        <div class="row about-us">
            <div class="col">
                <div class="about-us-title">
                    اتصل بنا
                </div>
                <div class="about-us-orgname">
                   <?= $connect_us->title ;?>
                </div>
                <div class="about-us-desc mb-4">
                    <?= $connect_us->address ;?>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-envelope contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>البريد الإلكتروني</strong>
                                </div>
                                <a href="mailto:<?= $connect_us->email ;?>"><?= $connect_us->email ;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-mobile-alt contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>الجوال</strong>
                                </div>
                                <a href="tel:<?= $connect_us->phone ;?>" dir="ltr"><?= $connect_us->phone ;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fas fa-phone-alt contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>الهاتف</strong>
                                </div>
                                <a href="tel:<?= $connect_us->phone_number ;?>" dir="ltr"><?= $connect_us->phone_number ;?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fab fa-twitter contact-us-icon twitter-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>تويتر</strong>
                                </div>
                                <a href="<?= $connect_us->twitter ;?>"><?= $connect_us->twitter ;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fab fa-snapchat-ghost contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>سناب شات</strong>
                                </div>
                                <a href="<?= $connect_us->snap ;?>" dir="ltr"><?= $connect_us->snap ;?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2"><i class="fab fa-instagram contact-us-icon"></i></div>
                            <div class="col-10">
                                <div class="mb-1">
                                    <strong>انستغرام</strong>
                                </div>
                                <a href="<?= $connect_us->instagram ;?>" dir="ltr"><?= $connect_us->instagram ;?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-left">
                <img src="<?= Yii::$app->request->baseUrl ?>/images/contact-us.png" />
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/js/bootstrap.bundle.min.js"></script>