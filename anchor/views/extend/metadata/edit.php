<?= $header; ?>

<header class="wrap">
  <h1><?= __('metadata.metadata'); ?></h1>
</header>

<section class="wrap">
  <form method="post" action="<?= Uri::to('admin/extend/metadata'); ?>" novalidate>
    <input name="token" type="hidden" value="<?= $token; ?>">

    <fieldset class="split">
      <legend>Admin Settings</legend>
      <p>
        <label for="label-dashboard_page"><?= __('metadata.dashboard_page', 'Dashboard page'); ?></label>
          <?= Form::select('dashboard_page', $dashboard_page_options,
              Input::previous('dashboard_page', $meta['dashboard_page']), [
                  'id'          => 'label-dashboard_page',
                  'placeholder' => __('metadata.dashboard_page_explain', 'Default dashboard page')
              ]); ?>
      </p>
    </fieldset>

    <fieldset class="split">
      <legend>Site Settings</legend>
      <p>
        <label for="label-sitename"><?= __('metadata.sitename'); ?>:</label>
          <?= Form::text('sitename', Input::previous('sitename', $meta['sitename']),
              ['id' => 'label-sitename']); ?>
        <em><?= __('metadata.sitename_explain'); ?></em>
      </p>
      <p>
        <label for="label-sitedescription"><?= __('metadata.sitedescription'); ?>:</label>
          <?= Form::textarea('description', Input::previous('description', $meta['description']), [
              'id'          => 'label-sitedescription',
              'placeholder' => __('metadata.sitedescription_explain')
          ]); ?>
      </p>
      <p>
        <label for="label-homepage"><?= __('metadata.homepage'); ?>:</label>
          <?= Form::select('home_page', $pages, Input::previous('home_page', $meta['home_page']), [
              'id'          => 'label-homepage',
              'placeholder' => __('metadata.homepage_explain')
          ]); ?>
      </p>
      <p>
        <label for="label-postspage"><?= __('metadata.postspage'); ?>:</label>
          <?= Form::select('posts_page', $pages, Input::previous('posts_page', $meta['posts_page']), [
              'id'          => 'label-postspage',
              'placeholder' => __('metadata.postspage_explain')
          ]); ?>
      </p>
      <p>
        <label for="label-posts_per_page"><?= __('metadata.posts_per_page'); ?>:</label>
          <?= Form::input('range', 'posts_per_page', Input::previous('posts_per_page', $meta['posts_per_page']),
              ['min'         => 1,
               'max'         => 15,
               'id'          => 'label-posts_per_page',
               'placeholder' => __('metadata.posts_per_page_explain')
              ]); ?>
        <em class="visible" id="posts_per_page_number"><?= $meta['posts_per_page']; ?></em>
      </p>
      <p>
        <label for="label-all_posts"><?= __('metadata.show_all_posts'); ?>:</label>
          <?php $checked = Input::previous('show_all_posts', $meta['show_all_posts']) ? ' checked' : ''; ?>
          <?= Form::checkbox('show_all_posts', 1, $checked, [
              'id'          => 'label-show_all_posts',
              'placeholder' => __('metadata.show_all_posts_explain')
          ]); ?>
      </p>
    </fieldset>

    <fieldset class="split">
      <legend><?= __('metadata.comment_settings'); ?></legend>
      <p>
        <label for="label-auto_published_comments"><?= __('metadata.auto_publish_comments'); ?>:</label>
          <?php $checked = Input::previous('auto_published_comments', $meta['auto_published_comments']) ? ' checked'
              : ''; ?>
          <?= Form::checkbox('auto_published_comments', 1, $checked, [
              'id'          => 'label-auto_published_comments',
              'placeholder' => __('metadata.auto_publish_comments_explain')
          ]); ?>
      </p>
      <p>
        <label for="label-comment_notifications"><?= __('metadata.comment_notifications'); ?>:</label>
          <?php $checked = Input::previous('comment_notifications', $meta['comment_notifications']) ? ' checked'
              : ''; ?>
          <?= Form::checkbox('comment_notifications', 1, $checked, [
              'id'          => 'label-comment_notifications',
              'placeholder' => __('metadata.comment_notifications_explain')
          ]); ?>
      </p>
      <p>
        <label for="label-comment_moderation_keys"><?= __('metadata.comment_moderation_keys'); ?>:</label>
          <?= Form::textarea('comment_moderation_keys',
              Input::previous('comment_moderation_keys', $meta['comment_moderation_keys']), [
                  'id'          => 'label-comment_moderation_keys',
                  'placeholder' => __('metadata.comment_moderation_keys_explain')
              ]); ?>
      </p>
    </fieldset>

    <fieldset class="split">
      <legend><?= __('metadata.theme_settings'); ?></legend>
      <p>
        <label for="label-theme"><?= __('metadata.current_theme'); ?>:</label>
        <select id="label-theme" name="theme">
            <?php foreach ($themes as $theme => $about): ?>
                <?php $selected = (Input::previous('theme', $meta['theme']) == $theme) ? ' selected' : ''; ?>
              <option value="<?= $theme; ?>"<?= $selected; ?>>
                  <?= $about['name']; ?> by <?= $about['author']; ?>
              </option>
            <?php endforeach; ?>
        </select>

        <em><?= __('metadata.current_theme_explain', 'Your current theme.'); ?></em>
      </p>
    </fieldset>

    <aside class="buttons">
        <?= Form::button(__('global.save'), ['type' => 'submit', 'class' => 'btn']); ?>

        <?= Html::link('admin/extend', __('global.cancel'), ['class' => 'btn cancel blue']); ?>
    </aside>
  </form>
</section>

<script type="text/javascript">

  // Show posts per page count
  $( document ).ready( function () {
    $( 'input[name="posts_per_page"]' ).change( function () {
      $( '#posts_per_page_number' ).text( $( this ).val() );
    } );
  } );

</script>
<?= $footer; ?>
