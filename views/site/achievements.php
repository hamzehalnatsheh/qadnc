<?php
$this->title = $achievement->title ;
?>
<div id="achievements" class="board">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div>
                    <?php if(str_contains($achievement->image, 'youtube')):?>
                        <?php 
                             
                             $parsed_video = parse_url($achievement->vedio, PHP_URL_QUERY);
                             parse_str($parsed_video, $arr);?>
                        <iframe width="100%" height="443" class="yvideo" id="p1QgNF6J1h0"
                                src="https://www.youtube.com/embed/<?= $arr['v'];  ;?>"
                                frameborder="0" allowfullscreen>
                    </iframe>
                    <?php else:?>
                        <img src="<?= Yii::$app->request->baseUrl . '/' . $achievement->image  ?>" width="100%" />
                     <?php endif;?>   
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div>
                    <h1 class="course-title">
                        <strong>
                            <?= $achievement->title ?>
                        </strong>
                    </h1>
                </div>

                <div class="course-description">
                    التفاصيل
                </div>
                <div>
                    <pre>
                        <?= $achievement->body ?>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>