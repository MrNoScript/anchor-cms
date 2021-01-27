<?= $header; ?>

  <header class="wrap">
    <h1><?= __('extend.editing_variable', $variable->user_key); ?></h1>
  </header>

  <section class="wrap">
    <form method="post" action="<?= Uri::to('admin/extend/variables/edit/' . $variable->key); ?>" novalidate>
      <input name="token" type="hidden" value="<?= $token; ?>">

      <fieldset class="split">
        <p>
          <label for="label-name"><?= __('extend.name'); ?>:</label>
            <?= Form::text('key', Input::previous('key', $variable->user_key), ['id' => 'label-name']); ?>
          <em><?= __('extend.name_explain'); ?></em>
        </p>

        <p>
          <label for="label-value"><?= __('extend.value'); ?>:</label>
            <?= Form::textarea('value', Input::previous('value', $variable->value),
                ['cols' => 20, 'id' => 'label-value']); ?>
          <em><?= __('extend.value_explain'); ?></em>
          <summary><?= __('extend.value_code_snipet', $variable->user_key); ?></summary>
        </p>
      </fieldset>

      <aside class="buttons">
          <?= Form::button(__('global.update'), ['class' => 'btn', 'type' => 'submit']); ?>

          <?= Html::link('admin/extend/variables', __('global.cancel'), ['class' => 'btn cancel blue']); ?>

          <?= Html::link('admin/extend/variables/delete/' . $variable->key,
              __('global.delete'), ['class' => 'btn delete red']); ?>
      </aside>
    </form>
  </section>

<?= $footer; ?>
