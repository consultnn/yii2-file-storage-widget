<?php

namespace consultnn\yii2\filestorage\widget;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class LightBoxAsset
 * @package consultnn\yii2\filestorage\widget
 */
class LightBoxAsset extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->sourcePath = '@bower/lightbox2/dist';
        $this->css = ['css/lightbox.css'];
        $this->js = ['js/lightbox.js'];
        $this->depends = [JqueryAsset::class];

        parent::init();
    }
}
