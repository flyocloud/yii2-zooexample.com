<?php

/** @var yii\web\View $this */

use Flyo\Yii\Module;
use Flyo\Yii\Widgets\ContainerWidget;
use yii\helpers\Html;
use yii\web\View;
use Idleberg\ViteManifest\Manifest;

/** @var string $content */
/** @var View $this */

if (!YII_ENV_PROD) {
    $this->registerJs(<<<'EOT'
        window.addEventListener("message", (event) => {
            if (event.data?.action === 'pageRefresh') {
                window.location.reload(true);
            }
        })
    EOT, View::POS_HEAD);
}
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title><?= Html::encode($this->title); ?></title>
    <?php if (YII_ENV_DEV): ?>
    <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/main.js"></script>
    <?php else: 
        $vm = new Manifest(Yii::getAlias('@webroot/resources/dist/manifest.json'), Yii::getAlias('@web/resources/dist/'));
        $entrypoint = $vm->getEntrypoint("main.js", false);
        if ($entrypoint) {
            ["url" => $url, "hash" => $hash] = $entrypoint;
            echo "<script type='module' src='$url' crossorigin integrity='$hash'></script>" . PHP_EOL;
        }
        foreach ($vm->getImports("main.js", false) as $import) {
            ["url" => $url] = $import;
            echo "<link rel='modulepreload' href='$url' />" . PHP_EOL;
        }
        foreach ($vm->getStyles("main.js", false) as $style) {
            ["url" => $url, "hash" => $hash] = $style;
            echo "<link rel='stylesheet' href='$url' crossorigin integrity='$hash' />" . PHP_EOL;
        }
    endif;
    ?>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<header class="bg-gray-200 p-5">
    <?php $nav = ContainerWidget::begin(['identifier' => 'nav']); ?>
        <ul>
            <?php foreach ($nav->getItems() as $item): ?>
                <li><?= Html::a($item->getLabel(), $item->getHref()); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php $nav::end(); ?>
</header>

<main role="main">
    <div class="container mx-auto p-5 my-5">
        <?= $content; ?>
    </div>
</main>

<footer class="border bg-gray-200 p-5">
    <div class="container">
        <div>&copy; My Company <?= date('Y'); ?> | <a href="/sitemap">Sitemap</a> | <a href="/search">Search</a></div>
    </div>
</footer>

<?php $this->endBody(); ?>
<!-- debug: <?= var_export(YII_DEBUG); ?> | env: <?= YII_ENV; ?> | release: <?= Yii::$app->version; ?> | version: <?= YII_ENV_PROD ? Module::getVersionApi()->getVersion() : 0; ?> -->
</body>
</html>
<?php $this->endPage(); ?>
