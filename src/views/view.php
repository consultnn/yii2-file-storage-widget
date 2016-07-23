<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var array $images
 * @var \backend\widgets\filestorageform\FileUpload $context
 */
$context = $this->context;
$removeBtn = '<i class="fa fa-remove fa-lg remove-btn"></i>';

$renderPreview = function($image) use ($context){
    $previewUrl = Yii::$app->fileStorage->get($image, ['w' => 100, 'h' => 100, 'zc' => 1]);
    $sourceUrl = Yii::$app->fileStorage->get($image, ['w' => 1200]);

    return Html::a(
        Html::img($previewUrl, ['width' => 100, 'height' => 100]),
        $sourceUrl,
        [
            'data-lightbox' => 'images-' . $context->id
        ]
    );
}

?>

<div id="<?= $context->id ?>" class="file-upload-container">
    <label class="file">
        <input type="file"
               id="file"
               accept="<?= $context->filter; ?>"
            <?= $context->multiple ? 'multiple' : '' ?>
        >
        <span class="file-custom"></span>
    </label>
    <div class="previews">
        <?php if (is_array($images)) : ?>
            <?php foreach ($images as $image) : ?>
                <div class="preview">
                    <?= $renderPreview($image) ?>
                    <input type="hidden" name="<?= Html::getInputName($context->model, $context->attribute) ?>[]" value="<?= $image ?>">
                    <?= $removeBtn ?>
                </div>
            <?php endforeach; ?>
        <?php elseif (!empty($images)) : ?>
            <div class="preview">
                <?= $renderPreview($images) ?>
                <input type="hidden" name="<?= Html::getInputName($context->model, $context->attribute) ?>" value="<?= $images ?>">
                <?= $removeBtn ?>
            </div>
        <?php endif; ?>
    </div>
</div>