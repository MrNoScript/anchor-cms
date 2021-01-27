<?= $header; ?>

<header class="wrap">
  <h1><?= __('extend.create_field'); ?></h1>
</header>

<section class="wrap">
  <form method="post" action="<?= Uri::to('admin/extend/fields/add'); ?>" novalidate>
    <input name="token" type="hidden" value="<?= $token; ?>">

    <fieldset class="split">
      <p>
        <label for="label-type"><?= __('extend.type'); ?>:</label>
          <?= Form::select('type', $types, Input::previous('type'), ['id' => 'label-type']); ?>
        <em><?= __('extend.type_explain'); ?></em>
      </p>

      <p style="display: none">
        <label for="pagetype"><?= __('extend.pagetype'); ?>:</label>
        <select id="pagetype" name="pagetype">
            <?php foreach ($pagetypes as $pagetype): ?>
                <?php $selected = (Input::previous('pagetype') == $pagetype->key) ? ' selected' : ''; ?>
              <option
                value="<?= $pagetype->key; ?>" <?= $selected; ?>><?= $pagetype->value; ?></option>
            <?php endforeach; ?>
        </select>
        <em><?= __('extend.pagetype_explain'); ?></em>
      </p>

      <p>
        <label for="field"><?= __('extend.field'); ?>:</label>
        <select id="label-field" name="field">
            <?php foreach ($fields as $type): ?>
                <?php $selected = (Input::previous('field') == $type) ? ' selected' : ''; ?>
              <option<?= $selected; ?>><?= $type; ?></option>
            <?php endforeach; ?>
        </select>
        <em><?= __('extend.field_explain'); ?></em>
      </p>

      <p>
        <label for="label-key"><?= __('extend.key'); ?>:</label>
          <?= Form::text('key', Input::previous('key'), ['id' => 'label-key']); ?>
        <em><?= __('extend.key_explain'); ?></em>
      </p>

      <p>
        <label for="label-label"><?= __('extend.label'); ?>:</label>
          <?= Form::text('label', Input::previous('label'), ['id' => 'label-label']); ?>
        <em><?= __('extend.label_explain'); ?></em>
      </p>

      <p class="hide attributes_type">
        <label for="label-attributes_type"><?= __('extend.attribute_type'); ?>:</label>
          <?= Form::text('attributes[type]', Input::previous('attributes.type'),
              ['id' => 'label-attributes_type']); ?>
        <em><?= __('extend.attribute_type_explain'); ?></em>
      </p>

      <p class="hide attributes_width">
        <label for="label-attributes_size_width"><?= __('extend.attributes_size_width'); ?>:</label>
          <?= Form::text('attributes[size][width]', Input::previous('attributes.size.width'),
              ['id' => 'label-attributes_size_width']); ?>
        <em><?= __('extend.attributes_size_width_explain'); ?></em>
      </p>

      <p class="hide attributes_height">
        <label for="label-attributes_size_height"><?= __('extend.attributes_size_height'); ?>:</label>
          <?= Form::text('attributes[size][height]', Input::previous('attributes.size.height'),
              ['id' => 'label-attributes_size_height']); ?>
        <em><?= __('extend.attributes_size_height_explain'); ?></em>
      </p>
    </fieldset>

    <aside class="buttons">
        <?= Form::button(__('global.save'), ['class' => 'btn', 'type' => 'submit']); ?>

        <?= Html::link('admin/extend/fields', __('global.cancel'), ['class' => 'btn cancel blue']); ?>
    </aside>
  </form>
</section>

<script src="<?= asset('anchor/views/assets/js/custom-fields.js'); ?>"></script>

<?= $footer; ?>
