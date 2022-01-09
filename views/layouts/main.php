<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Html;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl?>/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl?>/css/all.min.css" />
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl?>/css/site.css" />
    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl?>/css/header.css" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body id="body" class="d-flex flex-column h-100" dir="rtl">
    <?php $this->beginBody() ?>

    <header>
        <?php include "header.php" ?>
    </header>

    <main id="main" role="main">
        <?= $content ?>
    </main>

    <footer>
        <?php include "footer.php" ?>
    </footer>

    <?php $this->endBody() ?>
</body>
<script src="<?= Yii::$app->request->baseUrl?>/js/all.js"></script>
</html>
<?php $this->endPage() ?>