<?php
use Flyo\Yii\Widgets\PageWidget;

/** @var \Flyo\Model\Page $page */
?>
<h1><?= $page->getTitle(); ?></h1>
<?= PageWidget::widget(['page' => $page]); ?>