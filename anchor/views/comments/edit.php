<?= $header; ?>

<header class="wrap">
  <h1><?= __('comments.editing_comment'); ?> &rarr; <?php $commented_post = Post::where('id', '=',
          $comment->post)->get();
      echo $commented_post[0]->title; ?></h1>
</header>

<section class="wrap">
  <form method="post" action="<?= Uri::to('admin/comments/edit/' . $comment->id); ?>" novalidate>
    <input name="token" type="hidden" value="<?= $token; ?>">

    <fieldset class="split">
      <p>
        <label for="label-name"><?= __('comments.name'); ?>:</label>
          <?= Form::text('name', Input::previous('name', $comment->name), ['id' => 'label-name']); ?>
        <em><?= __('comments.name_explain'); ?></em>
      </p>

      <p>
        <label for="label-email"><?= __('comments.email'); ?>:</label>
          <?= Form::email('email', Input::previous('email', $comment->email), ['id' => 'label-email']); ?>
        <em><?= __('comments.email_explain'); ?></em>
      </p>

      <p>
        <label for="label-text"><?= __('comments.text'); ?>:</label>
          <?= Form::textarea('text', Input::previous('text', $comment->text), ['id' => 'label-text']); ?>
        <em><?= __('comments.text_explain'); ?></em>
      </p>

      <p>
        <label for="label-status"><?= __('comments.status', 'Status'); ?>:</label>
          <?= Form::select('status', $statuses, Input::previous('status', $comment->status),
              ['id' => 'label-status']); ?>
        <em><?= __('comments.status_explain'); ?></em>
      </p>
    </fieldset>

    <aside class="buttons">
        <?= Form::button(__('global.save'), ['type' => 'submit', 'class' => 'btn']); ?>

        <?= Html::link('admin/comments', __('global.cancel'), ['class' => 'btn cancel blue']); ?>

        <?= Html::link('admin/comments/delete/' . $comment->id, __('global.delete'), [
            'class' => 'btn delete red'
        ]); ?>
    </aside>
  </form>
</section>

<?= $footer; ?>
