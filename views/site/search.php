<div class="container mx-auto mt-10">
    <form method="get" class="mb-10 block border p-5">
        <input type="text" name="query" class="block bg-gray-200 border rounded" />
        <input type="submit" value="Suchen"/>
    </form>
    <?php if ($response): ?>
        <?php foreach ($response as $item): /** @var EntityinterfaceInner $item */ ?>
            <div class="p-3 rounded shadow">
                <h2><?= $item->getEntityTitle(); ?></h2>
                <h3><?= $item->getEntityTeaser(); ?></h3>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
