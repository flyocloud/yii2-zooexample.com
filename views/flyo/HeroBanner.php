<?php
/** @var \Flyo\Model\Block $block */
?>
<h1><?= $block->getContent()->title; ?></h1>
<h3><?= $block->getContent()->teaser; ?></h3>
<img class="img-fluid" style="width:100%;" src="<?= $block->getContent()->image->source; ?>" />