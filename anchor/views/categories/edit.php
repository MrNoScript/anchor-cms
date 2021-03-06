<?= $header; ?>

<header class="wrap">
  <h1><?= __('categories.edit_category', $category->title); ?></h1>
</header>

<section class="wrap">
  <form method="post" action="<?= Uri::to('admin/categories/edit/' . $category->id); ?>" novalidate>
    <input name="token" type="hidden" value="<?= $token; ?>">

    <fieldset class="split">
      <p>
        <label for="label-title"><?= __('categories.title'); ?>:</label>
          <?= Form::text('title', Input::previous('title', $category->title), ['id' => 'label-title']); ?>
        <em><?= __('categories.title_explain'); ?></em>
      </p>
      <p>
        <label for="label-slug"><?= __('categories.slug'); ?>:</label>
          <?= Form::text('slug', Input::previous('slug', $category->slug), ['id' => 'label-slug']); ?>
        <em><?= __('categories.slug_explain'); ?></em>
      </p>
      <p>
        <label for="label-description"><?= __('categories.description'); ?>:</label>
          <?= Form::textarea('description', Input::previous('description', $category->description),
              ['id' => 'label-description']); ?>
        <em><?= __('categories.description_explain'); ?></em>
      </p>
        <?php foreach ($fields as $field): ?>
          <p>
            <label for="extend_<?= $field->key; ?>"><?= $field->label; ?>:</label>
              <?= Extend::html($field); ?>
          </p>
        <?php endforeach; ?>
    </fieldset>

    <aside class="buttons">
        <?= Form::button(__('global.save'), ['type' => 'submit', 'class' => 'btn']); ?>

        <?= Html::link('admin/categories', __('global.cancel'), ['class' => 'btn cancel blue']); ?>

        <?= Html::link('admin/categories/delete/' . $category->id, __('global.delete'), [
            'class' => 'btn delete red'
        ]); ?>
    </aside>
  </form>
</section>

<script src="<?= asset('anchor/views/assets/js/slug.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/upload-fields.js'); ?>"></script>

<?= $footer; ?>
