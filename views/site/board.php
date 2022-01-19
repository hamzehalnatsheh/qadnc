<div id="board" class="board">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 ">
                <div class="activity-title">
                    أعضاء مجلس الإدارة
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <?php foreach ($membersCouncil as $membersCou):?>
                <div class="col-4 mb-5 text-center">
                    <div class="mb-3">
                        <img src="<?= Yii::$app->request->baseUrl ?>/images/default.png" alt="" class="board-img">
                    </div>
                    <div class="mb-2">
                        <strong>
                           <?= $membersCou->name?>
                        </strong>
                    </div>
                    <div class="mb-4">
                        رئيس مجلس الإدارة
                    </div>
                    <div>
                        <button class="btn btn-outline-primary btn-green">
                            سيرته الذاتية
                        </button>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>