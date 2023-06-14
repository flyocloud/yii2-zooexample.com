<?php

use Flyo\Model\EntityinterfaceInner;
?>
<div class="container mx-auto mt-10">
    <?php foreach ($response as $item): /** @var EntityinterfaceInner $item */ ?>
    <div class="p-3 rounded shadow">
        <h2><?= $item->getEntityTitle(); ?></h2>
        <h3><?= $item->getEntityTeaser(); ?></h3>
    </div>
    <?php endforeach; ?>
</div>
