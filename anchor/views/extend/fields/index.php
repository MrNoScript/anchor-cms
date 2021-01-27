<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.fields'); ?></h1>

    <nav>
      <a class="btn"
         href="<?= Uri::to('admin/extend/fields/add'); ?>"><?= __('extend.create_field'); ?></a>
    </nav>
  </header>

  <section class="wrap">

      <?php if (count($extend->results)): ?>
        <ul class="list">
            <?php foreach ($extend->results as $field): ?>
              <li>
                <a href="<?= Uri::to('admin/extend/fields/edit/' . $field->id); ?>">
                  <strong><?= $field->label; ?></strong>
                  <span><?= $field->type . ' ' . $field->field; ?></span>
                </a>
              </li>
            <?php endforeach; ?>
        </ul>

        <aside class="paging"><?= $extend->links(); ?></aside>
      <?php else: ?>
        <p class="empty">
          <span class="icon"></span> <?= __('extend.nofields_desc'); ?>
        </p>
      <?php endif; ?>
  </section>

<?= $footer; ?>
