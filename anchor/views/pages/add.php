<?= $header; ?>

<form method="post" action="<?= Uri::to('admin/pages/add'); ?>" enctype="multipart/form-data" novalidate>
  <input name="token" type="hidden" value="<?= $token; ?>">

  <fieldset class="header">
    <div class="wrap">

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
      </aside>

        <?= Form::text('title', Input::previous('title'), [
            'placeholder'  => __('pages.title'),
            'autocomplete' => 'off',
            'autofocus'    => 'true'
        ]); ?>

    </div>
  </fieldset>

  <fieldset class="redirect">
    <div class="wrap">
        <?= Form::text('redirect', Input::previous('redirect'), [
            'placeholder' => __('pages.redirect_url')
        ]); ?>
    </div>
  </fieldset>

  <fieldset class="main">
    <div class="wrap">
        <?= Form::textarea('markdown', Input::previous('markdown'), [
            'placeholder' => __('pages.content_explain')
        ]); ?>

        <?= $editor; ?>
    </div>
  </fieldset>

  <fieldset class="meta split">
    <div class="wrap">
      <p>
        <label for="label-show_in_menu"><?= __('pages.show_in_menu'); ?>:</label>
          <?= Form::checkbox('show_in_menu', 1, Input::previous('show_in_menu', 0) == 1,
              ['id' => 'label-show_in_menu']); ?>
        <em><?= __('pages.show_in_menu_explain'); ?></em>
      </p>
      <p>
        <label for="label-name"><?= __('pages.name'); ?>:</label>
          <?= Form::text('name', Input::previous('name'), ['id' => 'label-name']); ?>
        <em><?= __('pages.name_explain'); ?></em>
      </p>
      <p>
        <label for="label-slug"><?= __('pages.slug'); ?>:</label>
          <?= Form::text('slug', Input::previous('slug'), ['id' => 'label-slug']); ?>
        <em><?= __('pages.slug_explain'); ?></em>
      </p>
      <p>
        <label for="label-status"><?= __('pages.status'); ?>:</label>
          <?= Form::select('status', $statuses, Input::previous('status'), ['id' => 'label-status']); ?>
        <em><?= __('pages.status_explain'); ?></em>
      </p>
      <p>
        <label for="label-parent"><?= __('pages.parent'); ?>:</label>
          <?= Form::select('parent', $pages, Input::previous('parent'), ['id' => 'label-parent']); ?>
        <em><?= __('pages.parent_explain'); ?></em>
      </p>
        <?php if (count($pagetypes) > 0): ?>
          <p>
            <label for="pagetype"><?= __('pages.pagetype'); ?>:</label>
            <select id="pagetype" name="pagetype">
                <?php foreach ($pagetypes as $pagetype): ?>
                    <?php $selected = ($pagetype->key == 'all') ? ' selected="selected"' : ''; ?>
                  <option
                    value="<?= $pagetype->key; ?>" <?= $selected; ?>><?= $pagetype->value; ?></option>
                <?php endforeach; ?>
            </select>
            <em><?= __('pages.pagetype_explain'); ?></em>
          </p>
        <?php endif; ?>
      <div id="extended-fields">
          <?php foreach ($fields as $field): ?>
              <?php if ($field->pagetype == 'all'): ?>
              <p>
                <label for="extend_<?= $field->key; ?>"><?= $field->label; ?>:</label>
                  <?= Extend::html($field); ?>
              </p>
              <?php endif; ?>
          <?php endforeach; ?>
      </div>
    </div>
  </fieldset>
</form>

<script src="<?= asset('anchor/views/assets/js/slug.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/dragdrop.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/page-name.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/redirect.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/upload-fields.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/text-resize.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/editor.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/autosave.js'); ?>"></script>
<script>
  $( 'textarea[name=markdown]' ).editor();
  $( '#pagetype' ).on( 'change', function () {
    var $this = $( this );
    $.post( "<?= Uri::to('admin/get_fields'); ?>", {
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
