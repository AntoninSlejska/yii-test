<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$backgroundColor = isset($this->params['background_color'])?$this->params['background_color']:'#FFFFFF';
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
<body style="background-color:<?php echo $backgroundColor; ?>">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Reservations', 'items' => [
                ['label' => 'Grid', 'url' => ['/reservations/grid']],
                ['label' => 'Multiple Grid', 'url' => ['/reservations/multiple-grid']],
                ['label' => 'with Gii', 'url' => ['/reservations-with-gii']],
                ['label' => 'Dependent dropdown', 'url' => ['/reservations/detail-dependent-dropdown']],
                ]],
            ['label' => 'Rooms', 'url' => ['/rooms/index'], 'items' => [
                ['label' => 'list', 'url' => ['/rooms/index']],
                ['label' => 'filtered', 'url' => ['/rooms/index-filtered']],
                ['label' => 'with relationships', 'url' => ['/rooms/index-with-relationships']],
                ['label' => 'last reservation by room ID', 'url' => ['/rooms/last-reservation-by-room-id']],
                ['label' => 'last reservation for every room', 'url' => ['/rooms/last-reservation-for-every-room']],
                ['label' => 'with Gii', 'url' => ['/rooms-with-gii']],
                ]],
            ['label' => 'Customers', 'items' => [
                ['label' => 'with Gii', 'url' => ['/customers-with-gii']],
                ['label' => 'multiple models', 'url' => ['/customers/create-multiple-models']],
                ]],
            ['label' => 'Other', 'items' => [
                ['label' => 'Three Columns', 'url' => ['/three-columns']],
                ['label' => 'Table one', 'url' => ['/table-one']],
                ['label' => 'Date Picker', 'url' => ['/jui-widgets/date-picker']],
                ]],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

<?php
        // echo '<div class="well">
        //   This is content for blockADV from view
        //   <br />';
        //    if (isset($this->blocks['blockADV'])) {
        //     echo $this->blocks['blockADV'];
        //   } else {
        //     echo "<i>No content available</i>";
        //   }
        // echo '</div>';

        echo $content; ?>
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
