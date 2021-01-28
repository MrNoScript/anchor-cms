<?= $header; ?>

<form
  method="post"
  action="<?= Uri::to('admin/posts/edit/' . $article->id); ?>"
  enctype="multipart/form-data"
  novalidate
>
  <input name="token" type="hidden" value="<?= $token; ?>">

  <fieldset class="header">
    <div class="wrap">

      <aside class="buttons">
          <?= Form::button(__('global.save'), [
              'type'  => 'submit',
              'class' => 'btn'
          ]); ?>

          <?= Html::link('admin/posts', __('global.cancel'), [
              'class' => 'btn cancel blue'
          ]); ?>

          <?= Html::link('admin/posts/delete/' . $article->id, __('global.delete'), [
              'class' => 'btn delete red'
          ]); ?>
      </aside>

        <?= Form::text('title', Input::previous('title', $article->title), [
            'placeholder'  => __('posts.title'),
            'autocomplete' => 'off',
            'autofocus'    => 'true'
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="main">
    <div class="wrap">
        <?= Form::textarea('markdown', Input::previous('markdown', $article->markdown), [
            'placeholder' => __('posts.content_explain')
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="meta split">
    <div class="wrap">
      <p>
        <label for="label-slug"><?= __('posts.slug'); ?>:</label>
          <?= Form::text('slug', Input::previous('slug', $article->slug), ['id' => 'label-slug']); ?>
        <em><?= __('posts.slug_explain'); ?></em>
      </p>
      <p>
        <label><?= __('posts.time'); ?>:</label>
          <?= Form::text('created', Input::previous('created', $article->created)); ?>
        <em><?= __('posts.time_explain'); ?></em>
      </p>
      <p>
        <label for="description"><?= __('posts.description'); ?>:</label>
          <?= Form::textarea('description', Input::previous('description', $article->description)); ?>
        <em><?= __('posts.description_explain'); ?></em>
      </p>
      <p>
        <label for="label-status"><?= __('posts.status'); ?>:</label>
          <?= Form::select('status', $statuses, Input::previous('status', $article->status),
              ['id' => 'label-status']); ?>
        <em><?= __('posts.status_explain'); ?></em>
      </p>
      <p>
        <label for="label-category"><?= __('posts.category'); ?>:</label>
          <?= Form::select('category', $categories, Input::previous('category', $article->category),
              ['id' => 'label-category']); ?>
        <em><?= __('posts.category_explain'); ?></em>
      </p>
      <?php if(User::admin()): ?>
      <p>
        <label for="label-comments"><?= __('posts.allow_comments'); ?>:</label>
          <?= Form::checkbox('comments', 1, Input::previous('comments', $article->comments) == 1,
              ['id' => 'label-comments']); ?>
        <em><?= __('posts.allow_comments_explain'); ?></em>
      </p>
      <p>
        <label for="label-css"><?= __('posts.custom_css'); ?>:</label>
          <?= Form::textarea('css', Input::previous('css', $article->css), ['id' => 'label-css']); ?>
        <em><?= __('posts.custom_css_explain'); ?></em>
      </p>
      <p>
        <label for="label-js"><?= __('posts.custom_js'); ?>:</label>
          <?= Form::textarea('js', Input::previous('js', $article->js), ['id' => 'label-js']); ?>
        <em><?= __('posts.custom_js_explain'); ?></em>
      </p>
      <?php endif; ?>
        <?php foreach ($fields as $field): ?>
          <p>
            <label for="extend_<?= $field->key; ?>"><?= $field->label; ?>:</label>
              <?= Extend::html($field); ?>
          </p>
        <?php endforeach; ?>
    </div>
  </fieldset>
</form>

<script src="<?= asset('anchor/views/assets/js/simplemde.min.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/slug.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/dragdrop.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/upload-fields.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/text-resize.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/editor.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/change-saver.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/autosave.js'); ?>"></script>
<script>
  var simplemde = new SimpleMDE({ element: document.querySelector( 'textarea[name=markdown]' ) });
  $( 'form' ).changeSaver( 'textarea[name=markdown]' );
</script>

<?= $footer; ?>
