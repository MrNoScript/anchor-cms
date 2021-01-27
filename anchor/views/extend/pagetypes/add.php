<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.create_pagetype'); ?></h1>
  </header>

  <section class="wrap">
    <form method="post" action="<?= Uri::to('admin/extend/pagetypes/add'); ?>" novalidate>
      <input name="token" type="hidden" value="<?= $token; ?>">

      <fieldset class="split">
        <p>
          <label><?= __('extend.name'); ?>:</label>
            <?= Form::text('value', Input::previous('value')); ?>
          <em><?= __('extend.name_explain'); ?></em>
        </p>

        <p>
          <label><?= __('pages.slug'); ?>:</label>
            <?= Form::text('key', Input::previous('key')); ?>
          <em><?= __('pages.slug_explain'); ?></em>
        </p>
      </fieldset>

      <aside class="buttons">
          <?= Form::button(__('global.save'), ['class' => 'btn', 'type' => 'submit']); ?>

          <?= Html::link('admin/extend/pagetypes', __('global.cancel'), ['class' => 'btn cancel blue']); ?>
      </aside>
    </form>
  </section>

<?= $footer; ?>
