<div class="courses-body">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    الدورات
                </div>
            </div>
        </div>
        <div class="row">
            <?php $is_loggedin= Yii::$app->user->isGuest ? false:true ?>
            <?php foreach ($courses as $course):?>
                <?php
                    $is_regist_coures=false;
                    if($is_loggedin){
                        $coures_user= \app\models\User::find(\Yii::$app->user->identity->id);
                    }


                ?>

                <a href="<?= Yii::$app->request->baseUrl ."/site/courses/$course->id" ?>" class="col-3 mb-4">
                    <div class="card">
                        <div>
                            <img src="<?= Yii::$app->request->baseUrl .'/'.$course->image  ?>" width="100%" />
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <strong>
                                    <?=$course->title ?>

                                </strong>
                            </div>
                            <div class="category mb-3">
                                <?= $course['categorytype']['name'] ?>

                            </div>
                            <div>
                                    <?php if(!$is_regist_coures):?>
                                        <button type="submit" class="btn btn-link register_coure" onclick="register_coure(<?= $course->id ?> ,  <?= $is_loggedin ?>)"  course_id="<?= $course->id ?>"    is_loggedin="<?=$is_loggedin?>" >
                                            <strong>
                                                تسجيل
                                            </strong>
                                        </button>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>

            <?php endforeach;?>


        </div>
    </div>
</div>