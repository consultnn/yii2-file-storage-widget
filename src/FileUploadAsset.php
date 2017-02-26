<?php

namespace consultnn\yii2\filestorage\widget;

use yii\web\AssetBundle;

/**
 * Class FileUploadAsset
 * @package consultnn\yii2\filestorage\widget
 */
class FileUploadAsset extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->sourcePath = '@vendor/consultnn/yii2-file-storage-widget/src/assets';
        $this->css = ['file-upload.css'];
        $this->js = ['file-upload.js'];
        $this->depends = [LightBoxAsset::class];

        parent::init();
    }
}
