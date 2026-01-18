<?php $pager->setSurroundCount(2) ?>

<div class="join">
    <?php if ($pager->hasPrevious()) : ?>
        <a href="<?= $pager->getFirst() ?>" aria-label="First" class="join-item btn btn-md">«</a>
        <a href="<?= $pager->getPrevious() ?>" aria-label="Previous" class="join-item btn btn-md">‹</a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <a href="<?= $link['uri'] ?>" class="join-item btn btn-md <?= $link['active'] ? 'btn-active bg-primary-500 text-white' : '' ?>">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <a href="<?= $pager->getNext() ?>" aria-label="Next" class="join-item btn btn-md">›</a>
        <a href="<?= $pager->getLast() ?>" aria-label="Last" class="join-item btn btn-md">»</a>
    <?php endif ?>
</div>