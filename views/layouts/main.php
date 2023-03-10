<?php

/** @var yii\web\View $this */

use Flyo\Yii\Widgets\NavWidget;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var string $content */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php $nav = NavWidget::begin(); ?>
        <ul>
        <?php foreach ($nav->getItems() as $item): ?>
            <li><?= Html::a($item->getLabel(), $item->getPath()); ?></li>
        <?php endforeach; ?>
        </ul>
    <?php $nav::end(); ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?> | <a href="/site/sitemap">Sitemap</a></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>