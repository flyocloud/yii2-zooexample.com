<?php
/** @var \Flyo\Model\Block $block */
?>
<h1><?= $block->getContent()['title']; ?></h1>
<h3><?= $block->getContent()['teaser']; ?></h3>
<img src="<?= $block->getContent()['image']->source; ?>" />