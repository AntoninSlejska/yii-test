<?php

/* @var $scenario Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see('My Company');
$I->seeLink('Grid');
$I->click('Grid');
$I->see('Reservations');
