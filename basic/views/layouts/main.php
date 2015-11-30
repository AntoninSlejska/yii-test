<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
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
    <?php
    NavBar::begin([
        'brandLabel' => 'Basic Tests',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $navItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'Status'), 'url' => ['/status/index']],
        ['label' => Yii::t('app', 'Gii'), 'items' => [
            ['label' => Yii::t('app', 'Simple Gii'), 'url' => ['/simple-gii']],
            ['label' => Yii::t('app', 'Enhanced Gii'), 'url' => ['/enhanced-gii']],
            ['label' => Yii::t('app', 'AJAX CRUD'), 'url' => ['/ajax-crud']],
            ['label' => Yii::t('app', 'Kartik CRUD'), 'url' => ['/kartik-crud']],
            ['label' => Yii::t('app', 'Giiant'), 'url' => ['/sample']],
            ]],
        ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
      ];
    if (Yii::$app->user->isGuest) {
      array_push($navItems, ['label' => Yii::t('app', 'Sign In'), 'url' => ['/user/login']],
                            ['label' => Yii::t('app', 'Sign Up'), 'url' => ['/user/register']]);
    } else {
      array_push($navItems, ['label' => Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                             'url' => ['/site/logout'],
                             'linkOptions' => ['dataMethod' => 'post'],
                             ]
      );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
