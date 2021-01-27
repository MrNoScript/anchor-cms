<?= $header; ?>

<header class="wrap">
  <h1><?= __('comments.comments'); ?></h1>
</header>

<section class="wrap">

  <nav class="sidebar statuses">
      <?php foreach ($statuses as $data): extract($data); ?>
          <?= Html::link('admin/comments/' . $url, '<span class="icon"></span> ' . __($lang), [
              'class' => $class . (isset($status) && $status == $url ? ' active' : '')
          ]); ?>
      <?php endforeach; ?>
  </nav>

    <?php if ($comments->count): ?>
      <ul class="main list">
          <?php foreach ($comments->results as $comment): ?>
            <li>
              <a href="<?= Uri::to('admin/comments/edit/' . $comment->id); ?>">
                <strong><?= strip_tags($comment->text); ?></strong>
                <span><time><?= Date::format($comment->date); ?></time></span>
                <span class="highlight"><?= __('global.' . $comment->status); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
      </ul>

      <aside class="paging"><?= $comments->links(); ?></aside>

    <?php else: ?>
      <p class="empty comments">
        <span class="icon"></span>
          <?= __('comments.nocomments_desc'); ?>
      </p>
    <?php endif; ?>
</section>

<?= $footer; ?>
