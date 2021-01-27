<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.editing_pagetype', $pagetype->key); ?></h1>
  </header>

  <section class="wrap">
    <form method="post" action="<?= Uri::to('admin/extend/pagetypes/edit/' . $pagetype->key); ?>" novalidate>
      <input name="token" type="hidden" value="<?= $token; ?>">

      <fieldset class="split">
        <p>
          <label><?= __('extend.name'); ?>:</label>
            <?= Form::text('value', Input::previous('value', $pagetype->value)); ?>
          <em><?= __('extend.name_explain'); ?></em>
        </p>

        <p>
          <label><?= __('pages.slug'); ?>:</label>
            <?= Form::text('key', Input::previous('key', $pagetype->key)); ?>
          <em><?= __('pages.slug_explain'); ?></em>
        </p>
      </fieldset>

      <aside class="buttons">
          <?= Form::button(__('global.update'), ['class' => 'btn', 'type' => 'submit']); ?>

          <?= Html::link('admin/extend/pagetypes', __('global.cancel'), ['class' => 'btn cancel blue']); ?>

          <?php if ($pagetype->key != 'all'): ?>
              <?= Html::link('admin/extend/pagetypes/delete/' . $pagetype->key,
                  __('global.delete'), ['class' => 'btn delete red']); ?>
          <?php endif; ?>
      </aside>
    </form>
  </section>

<?= $footer; ?>
