<?= $header; ?>

<header class="wrap">
  <h1><?= __('extend.pagetypes'); ?></h1>

  <nav>
      <?= Html::link('admin/extend/pagetypes/add', __('extend.create_pagetype'), ['class' => 'btn']); ?>
  </nav>
</header>

<section class="wrap">

    <?php if (count($pagetypes) >= 1): ?>
      <ul class="list">
          <?php foreach ($pagetypes as $type): ?>
            <li>
              <a href="<?= Uri::to('admin/extend/pagetypes/edit/' . $type->key); ?>">
                <strong><?= e($type->value); ?></strong>
                <p><?= $type->key; ?></p>
              </a>
            </li>
          <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="empty">
        <span class="icon"></span> <?= __('extend.notypes_desc'); ?>
      </p>
    <?php endif; ?>
</section>

<?= $footer; ?>
