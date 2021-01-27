<?= $header; ?>

<header class="wrap">
  <h1><?= __('pages.pages'); ?></h1>

    <?php if ($pages->count): ?>
      <nav>
          <?= Html::link('admin/pages/add', __('pages.create_page'), ['class' => 'btn']); ?>
          <?= Html::link('admin/menu', __('menu.edit_menu'), ['class' => 'btn']); ?>
      </nav>
    <?php endif; ?>
</header>

<section class="wrap">

  <nav class="sidebar statuses">
      <?= Html::link('admin/pages', '<span class="icon"></span> ' . __('global.all'), [
          'class' => ($status == 'all') ? 'active' : ''
      ]); ?>
      <?php foreach (['published', 'draft', 'archived'] as $type): ?>
          <?= Html::link('admin/pages/status/' . $type, '<span class="icon"></span> ' . __('global.' . $type),
              [
                  'class' => ($status == $type) ? 'active' : ''
              ]); ?>
      <?php endforeach; ?>
  </nav>

    <?php if ($pages->count): ?>
      <ul class="main list">
          <?php foreach ($pages->results as $item): $display_pages = array_merge([$item], $item->children()); ?>
              <?php foreach ($display_pages as $page) : ?>
              <li>
                <a href="<?= Uri::to('admin/pages/edit/' . $page->data['id']); ?>">
                  <div class="<?php echo($page->data['parent'] != 0 ? 'indent' : ''); ?>">
                    <strong><?= $page->data['name']; ?></strong>
                    <span>
                        <?= $page->data['slug']; ?>
                      <em class="status <?= $page->data['status']; ?>"
                          title="<?= __('global.' . $page->data['status']); ?>">
                            <?= __('global.' . $page->data['status']); ?>
                        </em>
                      </span>
                  </div>
                </a>
              </li>
              <?php endforeach; ?>
          <?php endforeach; ?>
      </ul>

      <aside class="paging"><?= $pages->links(); ?></aside>

    <?php else: ?>
      <aside class="empty pages">
        <span class="icon"></span>
          <?= __('pages.nopages_desc'); ?><br>
          <?= Html::link('admin/pages/add', __('pages.create_page'), ['class' => 'btn']); ?>
      </aside>
    <?php endif; ?>
</section>

<?= $footer; ?>
