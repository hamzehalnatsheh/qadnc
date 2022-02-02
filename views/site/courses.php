<?php 
$this->title = 'الدورات' ;
?>
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
            <?php
            $is_loggedin = Yii::$app->user->isGuest ? false : true;
            $coures_user = [];
            $is_loggedin_str = Yii::$app->user->isGuest ? "false" : "true";
            if ($is_loggedin) {
                $coures_usermodel = \app\models\studentcourses\StudentCourses::find()
                    ->where(['student_id' => \Yii::$app->user->identity->id])->all();
                $coures_user = \yii\helpers\ArrayHelper::map($coures_usermodel, 'id', 'course_id');
            }


            ?>

            <?php if (empty($courses)) { ?>
                <div class="alert alert-warning" role="alert">
                    <strong>
                        لا يوجد دورات
                    </strong>
                </div>
            <?php } ?>
            <?php foreach ($courses as $course) : ?>

                <a href="<?= Yii::$app->request->baseUrl . "/site/courses/$course->id" ?>" class="col-12 col-sm-6 col-lg-3 mb-4">
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

                                <button type="submit" class="btn btn-link register_coure" onclick="register_coure(event,<?= $course->id ?>,<?= $is_loggedin_str ?>)" course_id="<?= $course->id ?>" is_loggedin="<?= $is_loggedin_str ?>">
                                    <strong id="st_<?= $course->id ?>">
                                        <?= ($is_loggedin == false || ($is_loggedin == true && in_array($course->id, $coures_user))) ? ' مسجل' : 'تسجيل في الدورة' ?>
                                    </strong>
                                </button>


                            </div>
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>


        </div>
    </div>
</div>