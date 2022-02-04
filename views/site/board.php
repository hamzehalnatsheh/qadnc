<?php
$this->title = ' أعضاء الجمعية المؤسسين' ;
?>

<div id="board" class="details">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    أعضاء الجمعية المؤسسين
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <?php

        use yii\helpers\Html;
        foreach ($membersCouncil as $membersCou):?>
                <div class="col-4 mb-5 text-center">
                    <div class="mb-3">
                        <?= \yii\helpers\Html::img( "/$membersCou->image" ,["alt"=>"", "class"=>"board-img"]);?>
                    </div>
                    <div class="mb-2">
                        <strong>
                           <?= $membersCou->name?>
                        </strong>
                    </div>
                    <div class="mb-4">
                        <?= $membersCou->position?>
                    </div>
                    <div>
                        <?= Html::a(' سيرته الذاتية',['site/board-profile','id'=>$membersCou->id],['class'=>'btn btn-outline-primary btn-green'])?>
                        
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>