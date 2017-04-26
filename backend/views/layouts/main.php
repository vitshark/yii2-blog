<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
//use common\widgets\Alert;


AppAsset::register($this);
$asset= backend\assets\AppAsset::register($this);
$baseUrl=$asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php if(!Yii::$app->user->isGuest): ?>
    <?= $this->render('header.php', ['baseUrl'=>$baseUrl]) ?>
    <?= $this->render('leftmenu.php', ['baseUrl'=>$baseUrl]) ?>
    <?= $this->render('content.php', ['content'=>$content]) ?>
    <?= $this->render('footer.php', ['baseUrl'=>$baseUrl]) ?>
    <?= $this->render('rightside.php', ['baseUrl'=>$baseUrl]) ?>
    <?php else : ?>
    <?= $this->render('content.php', ['content'=>$content]) ?>
    <?php endif ?>
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
