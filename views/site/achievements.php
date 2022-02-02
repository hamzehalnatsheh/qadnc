<?php
$this->title = $achievement->title ;
?>
<div id="achievements" class="board">
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <img src="<?= Yii::$app->request->baseUrl . '/' . $achievement->image  ?>" width="100%" height="350px" />
                </div>
            </div>
            <div class="col-7">
                <div>
                    <h1 class="course-title">
                        <strong>
                            <?= $achievement->title ?>
                        </strong>
                    </h1>
                </div>

                <div class="course-description">
                    تفاصيل الانجاز
                </div>
                <div>
                    <?= $achievement->body ?>
                </div>
            </div>
        </div>
    </div>
</div>