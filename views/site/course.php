<?php
/*
* @property string|null $title
* @property string|null $description
* @property string|null $start_at
* @property string|null $end_at
* @property string|null $image
* @property int|null $category
* @property int|null $status
 */

$this->title = $course->title;
$this->params['breadcrumbs'][] = $course->title;
?>

<div class="courses-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <img src="<?= Yii::$app->request->baseUrl . '/' . $course->image  ?>" width="100%" height="365px" />
                </div>
            </div>
            <div class="col-7">
                <div>
                    <h1 class="course-title">
                        <strong>
                            <?= $course->title; ?>
                        </strong>
                    </h1>
                </div>

                <div class="course-description">
                    تفاصيل الدورة
                </div>
                <div>
                    <?= $course->description; ?>
                </div>
                <hr>
                <div class="course-options">
                    <i class="far fa-bookmark pl-2"></i>
                    <strong>تصنيف الدورة: </strong>
                    <?= $course->category; ?>
                </div>
                <div class="course-options">
                    <i class="far fa-lightbulb pl-2"></i>
                    <strong>حالة الدورة: </strong>
                    <?= $course->status; ?>
                </div>
                <div class="course-options">
                    <i class="far fa-calendar-alt pl-2"></i>
                    <strong>بداية الدورة: </strong>
                    <span><?= Yii::$app->formatter->format($course->start_at, 'date') ?></span>
                </div>
                <div class="course-options">
                    <i class="far fa-calendar-alt pl-2"></i>
                    <strong>نهاية الدورة: </strong>
                    <span><?= Yii::$app->formatter->format($course->end_at, 'date') ?></span>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-8">
                <div>
                    <img src="<?= Yii::$app->request->baseUrl . '/' . $course->image  ?>" width="100%" height="350px" />
                </div>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h1 class="course-title">
                                <strong>
                                    <?= $course->title; ?>
                                </strong>
                            </h1>
                        </div>

                        <div class="course-description">
                            تفاصيل الدورة
                        </div>
                        <div>
                            <?= $course->description; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="course-options">
                    <i class="far fa-bookmark pl-2"></i>
                    <strong>تصنيف الدورة: </strong>
                    <span><?= $course->category; ?></span>
                </div>
                <div class="course-options">
                    <i class="far fa-lightbulb pl-2"></i>
                    <strong>حالة الدورة: </strong>
                    <span><?= $course->status; ?></span>
                </div>
                <div class="course-options">
                    <i class="far fa-calendar-alt pl-2"></i>
                    <strong>بداية الدورة: </strong>
                    <span><?= Yii::$app->formatter->format($course->start_at, 'date') ?></span>
                </div>
                <div class="course-options">
                    <i class="far fa-calendar-alt pl-2"></i>
                    <strong>نهاية الدورة: </strong>
                    <span><?= Yii::$app->formatter->format($course->end_at, 'date') ?></span>
                </div>
            </div>
        </div> -->
    </div>
</div>