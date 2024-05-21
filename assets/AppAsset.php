<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        //'https://fonts.googleapis.com/css?family=Karla:400,700|Roboto',
        'css/all.min.css',
        '/css/plugins/material/css/materialdesignicons.min.css',
        '/css/plugins/simplebar/simplebar.css',
        '/css/plugins/nprogress/nprogress.css',
        '/css/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css',
        '/css/jquery-jvectormap-2.0.3.css',
        '/css/daterangepicker.css',
        'https://cdn.quilljs.com/1.3.6/quill.snow.css',
        '/css/toastr.min.css',
        '/css/style.css',
        '/css/style2.css',
    ];
    public $js = [
        '/js/nprogress.js',
        //'/js/jquery.min.js',
        '/js/bootstrap.bundle.min.js',
        /* '/js/bootstrap.bundle.js', */
        '/js/simplebar.min.js',
        //'https://unpkg.com/hotkeys-js/dist/hotkeys.min.js',
        '/js/apexcharts.js',
        '/js/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js',
        '/js/jquery-jvectormap-2.0.3.min.js',
        '/js/jquery-jvectormap-world-mill.js',
        '/js/jquery-jvectormap-us-aea.js',
        '/js/moment.min.js',
        '/js/daterangepicker.js',
        '/js/fuction.js',
        //'/https://cdn.quilljs.com/1.3.6/quill.js',
        '/js/toastr.min.js',
        '/js/mono.js',
        '/js/chart.js',
        '/js/map.js',
        '/js/custom.js',
        '/js/Chart.bundle.js',
        '/js/utils.js',
        /* 'https://canvasjs.com/assets/script/canvasjs.min.js',
        'https://cdn.plot.ly/plotly-latest.min.js', */
        //'js/jquery-1.12.4.min',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];
}
