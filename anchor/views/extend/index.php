<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.extend'); ?></h1>
  </header>

  <section class="wrap">

    <ul class="list">
      <li>
        <a href="<?= Uri::to('admin/extend/pagetypes'); ?>">
          <strong><?= __('extend.pagetypes'); ?></strong>
          <span><?= __('extend.pagetypes_desc'); ?></span>
        </a>
      </li>
      <li>
        <a href="<?= Uri::to('admin/extend/fields'); ?>">
          <strong><?= __('extend.fields'); ?></strong>
          <span><?= __('extend.fields_desc'); ?></span>
        </a>
      </li>
      <li>
        <a href="<?= Uri::to('admin/extend/variables'); ?>">
          <strong><?= __('extend.variables'); ?></strong>
          <span><?= __('extend.variables_desc'); ?></span>
        </a>
      </li>
      <li>
        <a href="<?= Uri::to('admin/extend/metadata'); ?>">
          <strong><?= __('metadata.metadata'); ?></strong>
          <span><?= __('metadata.metadata_desc'); ?></span>
        </a>
      </li>
    </ul>
  </section>

<?= $footer; ?>
