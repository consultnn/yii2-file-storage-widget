<?php

namespace consultnn\yii2\filestorage\widget;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\InputWidget;

class FileUpload extends InputWidget
{
    const FILTER_IMAGE = 'image/*';
    const FILTER_AUDIO = 'audio/*';
    const FILTER_VIDEO = 'video/*';

    public $multiple = false;
    public $uploadUrl;
    public $filter;

    public function init()
    {
        $this->initClientScript();

        parent::init();
    }

    public function run()
    {
        $images = Html::getAttributeValue($this->model, $this->attribute);

        return $this->render(
            'view',
            [
                'images' => $images,
                'filter' => $this->filter,
            ]
        );
    }

    private function initClientScript()
    {
        $view = $this->getView();
        $uploadUrl = is_array($this->uploadUrl) ? Url::to($this->uploadUrl, 'http') : $this->uploadUrl;

        FileUploadAsset::register($view);

        $view->registerJs("$('#{$this->id}').fileUpload({
            multiple: ".($this->multiple ? 'true' : 'false').",
            uploadUrl: '{$uploadUrl}',
            inputName: '".Html::getInputName($this->model, $this->attribute).($this->multiple ? '[]' : '')."'
        });");

    }
}