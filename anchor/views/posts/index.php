<?= $header; ?>

<header class="wrap">
  <h1><?= __('posts.posts'); ?></h1>

    <?php if ($posts->count): ?>
      <nav>
          <?= Html::link('admin/posts/add', __('posts.create_post'), ['class' => 'btn']); ?>
      </nav>
    <?php endif; ?>
</header>

<section class="wrap">

  <nav class="sidebar">
    <nav class="statuses">
      <p>Statuses</p>
        <?= Html::link('admin/posts', '<span class="icon"></span> ' . __('global.all'), [
            'class' => isset($status) ? ($status == 'all' ? 'active' : '') : ''
        ]); ?>
        <?php foreach (['published', 'draft', 'archived'] as $type): ?>
            <?= Html::link('admin/posts/status/' . $type, '<span class="icon"></span> ' . __('global.' . $type),
                [
                    'class' => ($status == $type) ? 'active' : ''
                ]); ?>
        <?php endforeach; ?>
    </nav>
    <br>
    <nav class="categories">
      <p>Categories</p>
        <?php foreach ($categories as $cat): ?>
            <?= Html::link('admin/posts/category/' . $cat->slug, $cat->title, [
                'class' => (isset($category) and $category->id == $cat->id) ? 'active' : ''
            ]); ?>
        <?php endforeach; ?>
    </nav>
  </nav>

    <?php if ($posts->count): ?>
      <ul class="main list">
          <?php foreach ($posts->results as $article): ?>
            <li>
              <a href="<?= Uri::to('admin/posts/edit/' . $article->id); ?>">
                <strong><?= $article->title; ?></strong>
                <span>
                  <time><?= Date::format($article->created); ?></time>
                  <em class="status <?= $article->status; ?>"
                      title="<?= __('global.' . $article->status); ?>">
                      <?= __('global.' . $article->status); ?>
                  </em>
                </span>

                <p><?= strip_tags($article->description); ?></p>
              </a>
            </li>
          <?php endforeach; ?>
      </ul>

      <aside class="paging"><?= $posts->links(); ?></aside>

    <?php else: ?>

      <p class="empty posts">
        <span class="icon"></span>
          <?= __('posts.noposts_desc'); ?><br>
          <?= Html::link('admin/posts/add', __('posts.create_post'), ['class' => 'btn']); ?>
      </p>

    <?php endif; ?>
</section>

<?= $footer; ?>
