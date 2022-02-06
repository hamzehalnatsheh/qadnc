<?php

use yii\helpers\Html;

$this->title = $membersCouncil->name;
?>
<div id="profile" class="details">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <?= Html::img('/' . $membersCouncil->image, ['class' => "board-profile-picture"]) ?>

            </div>
            <div class="col-9">
                <div>
                    <strong>
                        <h1>
                            <?= $membersCouncil->name; ?>
                        </h1>
                    </strong>
                </div>
                <div class="mb-4">
                    <pre>
                        <?= $membersCouncil->general_definition; ?>
                    </pre>
                </div>
                <div>
                    <strong>
                        الشهادات العلمية
                    </strong>
                </div>
                <div class="mb-4">
                    <pre>
                    <?= $membersCouncil->certificates; ?>   
                    </pre>
                </div>
                <div>
                    <strong>
                        الدورات التدريبية
                    </strong>
                </div>
                <div class="mb-4">
                    <pre>
                    <?= $membersCouncil->courses; ?>
                    </pre>
                </div>
                <div>
                    <strong>
                        الخبرات العملية
                    </strong>
                </div>
                <div class="mb-4">
                    <pre>
                    <?= $membersCouncil->experiences; ?>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>