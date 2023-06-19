<?php

/** @var yii\web\View $this */

use Flyo\Yii\Widgets\ContainerWidget;
use yii\helpers\Html;
use yii\web\View;

/** @var string $content */
/** @var View $this */

if (!YII_ENV_PROD) {
    $this->registerJs(<<<'EOT'
        window.addEventListener("message", (event) => {
            if (event.data?.action === 'pageRefresh') {
                window.location.reload(true);
            }
        })
        EOT);
}
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody(); ?>

<header id="header">
    <?php $nav = ContainerWidget::begin(['identifier' => 'nav']); ?>
        <ul>
            <?php foreach ($nav->getItems() as $item): ?>
                <li><?= Html::a($item->getLabel(), $item->getPath()); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php $nav::end(); ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= $content; ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y'); ?> | <a href="/sitemap">Sitemap</a> | <a href="/search">Search</a></div>
        </div>
    </div>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
