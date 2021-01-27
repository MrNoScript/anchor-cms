<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.variables'); ?></h1>

    <nav>
        <?= Html::link('admin/extend/variables/add', __('extend.create_variable'), ['class' => 'btn']); ?>
    </nav>
  </header>

  <section class="wrap">

      <?php if (count($variables)): ?>
        <ul class="list">
            <?php foreach ($variables as $var): ?>
              <li>
                <a href="<?= Uri::to('admin/extend/variables/edit/' . $var->key); ?>">
                  <strong><?= substr($var->key, strlen('custom_')); ?></strong>
                  <p><?= e($var->value); ?></p>
                </a>
              </li>
            <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="empty">
          <span class="icon"></span> <?= __('extend.novars_desc'); ?>
        </p>
      <?php endif; ?>
  </section>

<?= $footer; ?>
