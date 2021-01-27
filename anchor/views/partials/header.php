<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= __('global.manage'); ?> <?= Config::meta('sitename'); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= asset('anchor/views/assets/img/favicon.png'); ?>"/>

    <script src="<?= asset('anchor/views/assets/js/zepto.1.2.min.js'); ?>"></script>


    <link rel="stylesheet" href="<?= asset('anchor/views/assets/css/admin.min.css'); ?>">

    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=600">
  </head>
  <body class="<?= Auth::guest() ? 'login' : 'admin'; ?> <?= str_replace('_', '-',
      Config::app('language')); ?>">

      <?= Notify::read(); ?>

    <header class="top">
      <div class="wrap">
          <?php if (Auth::user()): ?>
            <nav>
              <ul>
                <li class="logo">
                    <?php
                    $page = in_array(Config::meta('dashboard_page'), ['panel', 'pages', 'posts'])
                        ? Config::meta('dashboard_page') : 'panel';
                    ?>
                  <a href="<?= Uri::to('admin/' . $page); ?>">Anchor CMS</a>
                </li>

                  <?php $menu = ['posts', 'comments', 'pages', 'categories', 'users', 'extend']; ?>
                  <?php foreach ($menu as $url): ?>
                    <li <?php if (strpos(Uri::current(), $url) !== false) {
                        echo 'class="active"';
                    } ?>>
                      <a href="<?= Uri::to('admin/' . $url); ?>">
                          <?= ucfirst(__($url . '.' . $url)); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
              </ul>
            </nav>

              <?= Html::link('admin/logout', __('global.logout'), ['class' => 'btn']); ?>

              <?php $home = Registry::get('home_page'); ?>

              <?= Html::link($home->slug, __('global.visit_your_site'),
                  ['class' => 'btn', 'target' => '_blank']); ?>

          <?php else: ?>
            <aside class="logo">
              <a href="<?= Uri::to('admin/login'); ?>">Anchor CMS</a>
            </aside>
          <?php endif; ?>
      </div>
    </header>
