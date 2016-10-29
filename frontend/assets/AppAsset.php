<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
     public $css = [
        'css/select2.min.css',
        'css/site.css',
        'css/bootstrap-timepicker.min.css',
        'css/bootstrap4.min.css',
        'css/animate.css',
        'css/main.css',
        // 'css/normalize.css',
        // 'css/component.css',
        // 'css/component.css',
    ];
    public $js = [


        'js/jquery.PrintArea.js',
       'js/angular.js',
       'js/select2.min.js',
        'js/app.js',
        'js/calc.js',
        'js/printThis.js',
        'js/main.js',
        'js/bootstrap-timepicker.min.js',
        'js/jquery.dataTables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\web\JqueryAsset',
     //  'Zelenin\yii\SemanticUI\assets\SemanticUICSSAsset',
        'frontend\assets\FontAwesomeAsset',
    ];
}
