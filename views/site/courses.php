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
                    $coures_user= \app\models\User::find(\Yii::$app->user->identity->id);

                ?>

                <div class="col-3 mb-4">
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
                                        <button type="submit" class="btn btn-link " onclick="register_coure(<?= $course->id ?> ,  <?= $is_loggedin ?>)"  >
                                            <strong>
                                                تسجيل
                                            </strong>
                                        </button>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach;?>


        </div>
    </div>
</div>