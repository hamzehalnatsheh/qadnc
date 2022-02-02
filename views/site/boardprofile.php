<?php

use yii\helpers\Html;
$this->title = $membersCouncil->name  ;
?>
<div id="profile" class="details">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?= Html::img('/'. $membersCouncil->image ,['class'=>"board-profile-picture" ])?>
                 
            </div>
            <div class="col-9">
                <div>
                    <strong>
                        <?= $membersCouncil->name ;?>
                    </strong>
                </div>
                <div class="mb-4">
                    <?= $membersCouncil->general_definition ;?>
                </div>
                <div>
                    <strong>
                        الشهادات العلمية
                    </strong>
                </div>
                <div class="mb-4">
                    <?= $membersCouncil->certificates ;?>   
                </div>
                <div>
                    <strong>
                       الدورات التدريبية   
                    </strong>
                </div>
                <div class="mb-4">
                    <?= $membersCouncil->courses ;?>     
                </div>
                <div>
                    <strong>
                        الخبرات العملية
                    </strong>
                </div>
                <div class="mb-4">
                     <?= $membersCouncil->experiences ;?>        
                </div>
            </div>
        </div>
    </div>
</div>