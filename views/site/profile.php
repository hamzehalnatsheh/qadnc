<?php

use yii\helpers\Html;

$this->title = \Yii::$app->user->identity->first_name ;
?>
<div id="profile" class="board">
    <div class="container">
        <div class="row">
            <div class="col-3 text-center">
                <img src="<?= Yii::$app->request->baseUrl .'/'.\Yii::$app->user->identity->avatar ?>" alt="" class="board-profile-picture">
                <div class="mt-3 mb-4 text-primary">
                    <strong>
                        <?=\Yii::$app->user->identity->first_name . " ". \Yii::$app->user->identity->last_name ?> <?= Html::a('<i class="fas fa-edit"></i>',['site/edit-profile']) ?>
                    </strong>
                </div>
                <?php if(!is_null(\Yii::$app->user->identity->qualifications) ): ?>
                    <div>
                        <strong>
                            الشهادات العلمية
                        </strong>
                    </div>
                    <div class="mb-4">
                        <?=\Yii::$app->user->identity->qualifications ?>
                    </div>
                <?php endif;?>
                <?php if(!is_null(\Yii::$app->user->identity->experience) ): ?>
                <div>
                    <strong>
                        الخبرات العملية
                    </strong>
                </div>
                <div class="mb-4">
                    <?=\Yii::$app->user->identity->experience ?>
                </div>
                <?php endif;?>

                <?php if(!is_null(\Yii::$app->user->identity->activities) ): ?>
                <div>
                    <strong>
                        الدورات التدريبية
                    </strong>
                </div>
                <div class="mb-4">
                    <?=\Yii::$app->user->identity->activities ?>
                </div>
                <?php endif;?>
                
              
               
            </div>
            <div class="col-9">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                            الدورات الحالية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">الدورات السابقة</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <?php if(empty($currentcouress)):?>
                                <div class="alert alert-warning mt-4" role="alert">
                                        <strong>
                                        لا يوجد دورات
                                    </strong>
                                </div>
                            <?php endif;?>

                        <div class="row mt-4">

                        

                            <?php foreach($currentcouress as $ccouress):?>
                                    <a href="<?= Yii::$app->request->baseUrl . "/site/courses/$ccouress->id"?>" class="col-12 col-sm-6 col-lg-4 mb-4">
                                        <div class="card">
                                            <div>
                                                <img src="<?= Yii::$app->request->baseUrl  . '/' . $ccouress->image  ?>" alt="" width="100%" height="135px"">
                                            </div>
                                            <div class=" card-body">
                                                <div class="mb-3">
                                                    <strong>
                                                        <?=$ccouress->title?>
                                                    </strong>
                                                </div>
                                                <div class="category mb-3">
                                                    <strong>
                                                        <i class="fas fa-bookmark pl-2"></i>
                                                        <?= $ccouress['categorytype']['name'] ?>
                                                          </strong>
                                                </div>
                                                <div class="category mb-2">
                                                    <strong>
                                                        <i class="fas fa-clock pl-2"></i>

                                                        <?= Yii::$app->formatter->format($ccouress->start_at, 'date') ?></strong>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                             <?php endforeach;?>   
                           
                           
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                       
                            <?php if(empty($lastcouress)):?>
                                <div class="alert alert-warning mt-4" role="alert">
                                        <strong>
                                        لا يوجد دورات
                                    </strong>
                                </div>
                            <?php endif;?>

                        <div class="row mt-4">
                        <?php foreach($lastcouress as $lcouress):?>

                                    <a href="<?= Yii::$app->request->baseUrl . "/site/courses/$lcouress->id" ?>" class="col-12 col-sm-6 col-lg-4 mb-4">
                                        <div class="card">
                                            <div>
                                                <img src="<?= Yii::$app->request->baseUrl. '/' . $lcouress->image  ?> " alt="" width="100%" height="135px">
                                            </div>
                                            <div class=" card-body">
                                                <div class="mb-3">
                                                    <strong>
                                                        <?=$lcouress->title?>
                                                    </strong>
                                                </div>
                                                <div class="category mb-3">
                                                    <strong>
                                                        <i class="fas fa-bookmark pl-2"></i>
                                                        <?= $lcouress['categorytype']['name'] ?>
                                                    </strong>
                                                </div>
                                                <div class="category mb-2">
                                                    <strong>
                                                        <i class="fas fa-clock pl-2"></i>
                                                        
                                                        <?= Yii::$app->formatter->format($lcouress->start_at, 'date') ?> </strong>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                             <?php endforeach;?>   
                             </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?= Yii::$app->request->baseUrl ?>/js/bootstrap.bundle.min.js"></script>