<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\resources;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    // public $sourcePath = '@app/resources/assetFiles';
    public $basePath = '@webroot';
    public $baseUrl = '@web/resources/src/';
    public $css = [
        // 'css/bootstrap.css',
        'datatables.net-bs/css/dataTables.bootstrap.min.css',
        // 'css/style.css',
        'css/font-awesome.css',
        'https://fonts.googleapis.com/css?family=Carrois+Gothic',
        'https://fonts.googleapis.com/css?family==Work+Sans:400,500,600',

        'summernote/dist/summernote-bs4.css',
        'css/datepicker3.css',
        'select2/select2.min.css',
        'css/hover.css',
        'css/style.css',
        'css/custom.css',
    ];
    public $js = [ 
        'js/bootstrap.js',
        'datatables.net/js/jquery.dataTables.min.js',
        'datatables.net-bs/js/dataTables.bootstrap.min.js',
        'js/Chart.min.js',
        'js/modernizr.min.js',
        'js/chartinator.js',
        'js/skycons.js',
        'js/jquery.nicescroll.js',
        'js/vue.min.js',
        'js/printThis.js',
        'js/scripts.js',
        'datapicker/bootstrap-datepicker.js',
        'summernote/dist/summernote-bs4.js',
        'select2/select2.full.min.js',
        'js/initialize.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
