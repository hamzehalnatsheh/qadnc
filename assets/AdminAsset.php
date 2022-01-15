<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class  AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css ;
    public $js ;
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'airani\bootstrap\BootstrapRtlAsset',
    ];


    function __construct() {
        $path_theme="theme/new";
        $this->css=[
            "/css/all.min.css",
            "$path_theme/css_ar/main.css",
//            'css/site.css?v='.rand(),
            'css/orders.css?v='.rand(),
            'css/swiper/swiper-bundle.min.css',

        ];
        $this->js=[
            "$path_theme/main.js",
            'js/main.js?v='.rand(),
            'js/custum.js?v='.rand(),
            'js/sweetalert2/main.js',
//            "https://js.pusher.com/beams/1.0/push-notifications-cdn.js",
//            "https://js.pusher.com/7.0/pusher.min.js"
        ];
    }
}
