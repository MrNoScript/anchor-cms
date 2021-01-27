<section class="profile">
  <h5><?= __('global.profile'); ?></h5>

    <?php foreach ($profile as $row): ?>
      <p><code><?= $row['sql']; ?></code></p>
    <?php endforeach; ?>

  <p><?= __('global.profile_memory_usage'); ?>
      <?= readable_size(memory_get_peak_usage(true)); ?></p>
</section>
