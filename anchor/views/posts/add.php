<?= $header; ?>

<form method="post" action="<?= Uri::to('admin/posts/add'); ?>" enctype="multipart/form-data" novalidate>
    <input name="token" type="hidden" value="<?= $token; ?>">

    <fieldset class="header">
        <div class="wrap">

            <aside class="buttons">
                <?= Form::button(__('global.save'), array(
                    'type' => 'submit',
                    'class' => 'btn',
                    'data-loading' => __('global.saving')
                )); ?>

                <?= Html::link('admin/posts', __('global.cancel'), array(
                    'class' => 'btn cancel blue'
                )); ?>
            </aside>

            <?= Form::text('title', Input::previous('title'), array(
                'placeholder' => __('posts.title'),
                'autocomplete'=> 'off',
                'autofocus' => 'true'
            )); ?>

        </div>
    </fieldset>

    <fieldset class="main">
        <div class="wrap">
            <?= Form::textarea('markdown', Input::previous('markdown'), array(
                'placeholder' => __('posts.content_explain')
            )); ?>

            <?= $editor; ?>
        </div>
    </fieldset>

    <fieldset class="meta split">
        <div class="wrap">
            <p>
                <label for="label-slug"><?= __('posts.slug'); ?>:</label>
                <?= Form::text('slug', Input::previous('slug'), array('id' => 'label-slug')); ?>
                <em><?= __('posts.slug_explain'); ?></em>
            </p>
            <p>
                <label for="label-description"><?= __('posts.description'); ?>:</label>
                <?= Form::textarea('description', Input::previous('description'), array('id' => 'label-description')); ?>
                <em><?= __('posts.description_explain'); ?></em>
            </p>
            <p>
                <label for="label-status"><?= __('posts.status'); ?>:</label>
                <?= Form::select('status', $statuses, Input::previous('status'), array('id' => 'label-status')); ?>
                <em><?= __('posts.status_explain'); ?></em>
            </p>
            <p>
                <label for="label-category"><?= __('posts.category'); ?>:</label>
                <?= Form::select('category', $categories, Input::previous('category'), array('id' => 'label-category')); ?>
                <em><?= __('posts.category_explain'); ?></em>
            </p>
            <?php if(Auth::admin()): ?>
            <p>
                <label for="label-comments"><?= __('posts.allow_comments'); ?>:</label>
                <?= Form::checkbox('comments', 1, $checked_comments, array('id' => 'label-comments')); ?>
                <em><?= __('posts.allow_comments_explain'); ?></em>
            </p>
            <p>
                <label for="label-css"><?= __('posts.custom_css'); ?>:</label>
                <?= Form::textarea('css', Input::previous('css'), array('id' => 'label-css')); ?>
                <em><?= __('posts.custom_css_explain'); ?></em>
            </p>
            <p>
                <label for="label-js"><?= __('posts.custom_js', 'Custom JS'); ?>:</label>
                <?= Form::textarea('js', Input::previous('js'), array('id' => 'label-js')); ?>
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

<script src="<?= asset('anchor/views/assets/js/slug.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/dragdrop.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/upload-fields.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/text-resize.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/editor.js'); ?>"></script>
<script src="<?= asset('anchor/views/assets/js/autosave.js'); ?>"></script>
<script>
    $('textarea[name=markdown]').editor();
</script>

<?= $footer; ?>
