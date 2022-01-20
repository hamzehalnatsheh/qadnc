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
            <?php $is_loggedin = Yii::$app->user->isGuest ? false : true ?>
            <?php if (empty($courses)) { ?>
                <div class="alert alert-warning" role="alert">
                    <strong>
                        لا يوجد دورات
                    </strong>
                </div>
            <?php } ?>
            <?php foreach ($courses as $course) : ?>
                <?php
                $is_regist_coures = false;
                if ($is_loggedin) {
                    $coures_user = \app\models\User::find(\Yii::$app->user->identity->id);
                }
                ?>

                <a href="<?= Yii::$app->request->baseUrl . "/site/courses/$course->id" ?>" class="col-3 mb-4">
                    <div class="card">
                        <div>
                            <img src="<?= Yii::$app->request->baseUrl . '/' . $course->image  ?>" width="100%" height="135px" />
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>
                                    <?= $course->title ?>

                                </strong>
                            </div>
                            <div class="category mb-3">
                                <strong>
                                    <i class="fas fa-bookmark pl-2"></i>
                                    <?= $course['categorytype']['name'] ?>
                                </strong>
                            </div>
                            <div class="category mb-2">
                                <strong>
                                    <i class="fas fa-clock pl-2"></i>
                                    <?= Yii::$app->formatter->format($course->start_at, 'date') ?>
                                </strong>
                            </div>
                            <div>
                                <?php if (!$is_regist_coures) : ?>
                                    <button type="submit" class="btn btn-link register_coure" onclick="register_coure(<?= $course->id ?> ,  <?= $is_loggedin ?>)" course_id="<?= $course->id ?>" is_loggedin="<?= $is_loggedin ?>">
                                        <strong>
                                            تسجيل
                                        </strong>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>


        </div>
    </div>
</div>