<?= $header; ?>

<form
  method="post"
  action="<?= Uri::to('admin/pages/edit/' . $page->id); ?>"
  enctype="multipart/form-data"
  novalidate
>
  <input name="token" type="hidden" value="<?= $token; ?>">

  <fieldset class="header">
    <div class="wrap page">

      <aside class="buttons">
          <?= Form::button(__('global.save'), [
              'type'  => 'submit',
              'class' => 'btn'
          ]); ?>
        <a class="btn autosave-action autosave-label secondary" style="width: 154px;">Autosave: Off</a>
          <?= Form::button(__('pages.redirect'), [
              'class' => 'btn secondary redirector'
          ]); ?>

          <?= Html::link('admin/pages', __('global.cancel'), [
              'class' => 'btn cancel blue'
          ]); ?>

          <?php
          if ($deletable == true) {
              echo Html::link('admin/pages/delete/' . $page->id, __('global.delete'), [
                  'class' => 'btn delete red'
              ]);
          }
          ?>
      </aside>

        <?= Form::text('title', Input::previous('title', $page->title), [
            'placeholder'  => __('pages.title'),
            'autocomplete' => 'off',
            'autofocus'    => 'true'
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="redirect <?= ($page->redirect) ? 'show' : ''; ?>">
    <div class="wrap">
        <?= Form::text('redirect', Input::previous('redirect', $page->redirect), [
            'placeholder' => __('pages.redirect_url')
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="main">
    <div class="wrap">
        <?= Form::textarea('markdown', Input::previous('markdown', $page->markdown), [
            'placeholder' => __('pages.content_explain')
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="meta split">
    <div class="wrap">
      <p>
        <label for="label-show_in_menu"><?= __('pages.show_in_menu'); ?>:</label>
          <?= Form::checkbox('show_in_menu', 1, Input::previous('show_in_menu', $page->show_in_menu) == 1,
              ['id' => 'label-show_in_menu']); ?>
        <em><?= __('pages.show_in_menu_explain'); ?></em>
      </p>
      <p>
        <label for="label-name"><?= __('pages.name'); ?>:</label>
          <?= Form::text('name', Input::previous('name', $page->name), ['id' => 'label-name']); ?>
        <em><?= __('pages.name_explain'); ?></em>
      </p>
      <p>
        <label for="label-slug"><?= __('pages.slug'); ?>:</label>
          <?= Form::text('slug', Input::previous('slug', $page->slug), ['id' => 'label-slug']); ?>
        <em><?= __('pages.slug_explain'); ?></em>
      </p>
      <p>
        <label for="label-status"><?= __('pages.status'); ?>:</label>
          <?= Form::select('status', $statuses, Input::previous('status', $page->status),
              ['id' => 'label-status']); ?>
        <em><?= __('pages.status_explain'); ?></em>
      </p>
      <p>
        <label for="label-parent"><?= __('pages.parent'); ?>:</label>
          <?= Form::select('parent', $pages, Input::previous('parent', $page->parent),
              ['id' => 'label-parent']); ?>
        <em><?= __('pages.parent_explain'); ?></em>
      </p>
        <?php if (count($pagetypes) > 0): ?>
          <p>
            <label for="pagetype"><?= __('pages.pagetype'); ?>:</label>
            <select id="pagetype" name="pagetype">
                <?php foreach ($pagetypes as $pagetype): ?>
                    <?php $selected = (Input::previous('pagetype') == $pagetype->key || $page->pagetype == $pagetype->key)
                        ? ' selected="selected"' : ''; ?>
                  <option
                    value="<?= $pagetype->key; ?>" <?= $selected; ?>><?= $pagetype->value; ?></option>
                <?php endforeach; ?>
            </select>
            <em><?= __('pages.pagetype_explain'); ?></em>
          </p>
        <?php endif; ?>
      <div id="extended-fields">
          <?php foreach ($fields as $field): ?>
            <p>
              <label for="extend_<?= $field->key; ?>"><?= $field->label; ?>:</label>
                <?= Extend::html($field); ?>
            </p>
          <?php endforeach; ?>
      </div>
    </div>
  </fieldset>
</form>

<script src="<?= asset('anchor/views/assets/js/simplemde.min.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/redirect.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/dragdrop.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/upload-fields.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/text-resize.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/editor.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/change-saver.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/autosave.js'); ?>"></script>
<script>
  var simplemde = new SimpleMDE({ element: document.querySelector( 'textarea[name=markdown]' ) });

  $( '#pagetype' ).on( 'change', function () {
    var $this = $( this );
    $.post( "<?= Uri::to('admin/get_fields'); ?>", {
      id: <?= $page->id; ?>,
      pagetype: $this.val(),
      token:    "<?= $token; ?>"
    }, function ( res ) {
      res = JSON.parse( res );
      $( '#extended-fields' ).html( res.html );
      $( 'input[name="token"]' ).replaceWith( res.token );
    } );
  } );

</script>

<?= $footer; ?>
