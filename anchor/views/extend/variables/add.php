<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.create_variable'); ?></h1>
  </header>

  <section class="wrap">
    <form method="post" action="<?= Uri::to('admin/extend/variables/add'); ?>" novalidate>
      <input name="token" type="hidden" value="<?= $token; ?>">

      <fieldset class="split">
        <p>
          <label for="label-name"><?= __('extend.name'); ?>:</label>
            <?= Form::text('key', Input::previous('key'), ['id' => 'label-name']); ?>
          <em><?= __('extend.name_explain'); ?></em>
        </p>

        <p>
          <label for="label-value"><?= __('extend.value'); ?>:</label>
            <?= Form::textarea('value', Input::previous('value'), ['cols' => 20, 'id' => 'label-value']); ?>
          <em><?= __('extend.value_explain'); ?></em>
        </p>
      </fieldset>

      <aside class="buttons">
          <?= Form::button(__('global.save'), ['class' => 'btn', 'type' => 'submit']); ?>

          <?= Html::link('admin/extend/variables', __('global.cancel'), ['class' => 'btn cancel blue']); ?>
      </aside>
    </form>
  </section>

<?= $footer; ?>
