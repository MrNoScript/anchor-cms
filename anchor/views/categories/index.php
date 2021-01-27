<?= $header; ?>

  <header class="wrap">
    <h1><?= __('categories.categories'); ?></h1>

    <nav>
        <?= Html::link('admin/categories/add', __('categories.create_category'), ['class' => 'btn']); ?>
    </nav>
  </header>

  <section class="wrap">
    <ul class="list">
        <?php foreach ($categories->results as $category): ?>
          <li>
            <a href="<?= Uri::to('admin/categories/edit/' . $category->id); ?>">
              <strong><?= $category->title; ?></strong>

              <span><?= $category->slug; ?></span>
            </a>
          </li>
        <?php endforeach; ?>
    </ul>
    <aside class="paging"><?= $categories->links(); ?></aside>
  </section>

<?= $footer; ?>
