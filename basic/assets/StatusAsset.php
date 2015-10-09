<?php
namespace app\assets;

use yii\web\AssetBundle;

class StatusAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
      'js/jquery.simplyCountable.js',
      'js/twitter-test.js',
      'js/twitter_count.js',
      'js/status-counter.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
