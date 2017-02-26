<?php

namespace consultnn\yii2\filestorage\widget;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\InputWidget;

/**
 * Class FileUpload
 * @package consultnn\yii2\filestorage\widget
 */
class FileUploadWidget extends InputWidget
{
    /**
     * Available filters
     */
    const FILTER_IMAGE = 'image/*';
    const FILTER_AUDIO = 'audio/*';
    const FILTER_VIDEO = 'video/*';

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var string|array
     */
    public $uploadUrl;

    /**
     * @var string|array
     */
    public $filter;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->initClientScript();

        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $images = Html::getAttributeValue($this->model, $this->attribute);

        return $this->render(
            'view',
            [
                'images' => $images,
                'accept' => is_array($this->filter) ? implode(',', $this->filter): $this->filter,
            ]
        );
    }

    private function initClientScript()
    {
        $view = $this->getView();
        $uploadUrl = Url::to($this->uploadUrl, 'http');
        $inputName = Html::getInputName($this->model, $this->attribute) . ($this->multiple ? '[]' : '');

        FileUploadAsset::register($view);

        $view->registerJs("$('#{$this->id}').fileUpload({
            multiple: ".($this->multiple ? 'true' : 'false').",
            uploadUrl: '{$uploadUrl}',
            inputName: '{$inputName}'
        });");
    }
}