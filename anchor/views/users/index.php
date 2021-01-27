<?= $header; ?>

<header class="wrap">
  <h1><?= __('users.users'); ?></h1>

    <?php if (Auth::admin()) : ?>
      <nav>
          <?= Html::link('admin/users/add', __('users.create_user'), ['class' => 'btn']); ?>
      </nav>
    <?php endif; ?>
</header>

<section class="wrap">

  <ul class="list">
      <?php foreach ($users->results as $user): ?>
        <li>
          <a href="<?= Uri::to('admin/users/edit/' . $user->id); ?>">
            <strong><?= $user->real_name; ?></strong>
            <span><?= __('users.username'); ?>: <?= $user->username; ?></span>

            <em class="highlight"><?= __('users.' . $user->role); ?></em>
          </a>
        </li>
      <?php endforeach; ?>
  </ul>

  <aside class="paging"><?= $users->links(); ?></aside>
</section>

<?= $footer; ?>
