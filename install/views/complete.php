<?= $header; ?>

<?= Notify::read(); ?>

<section class="content small">
  <h1>Install complete!</h1>

    <?php if ($htaccess): ?>
      <p class="code">We could not write the <code>htaccess</code> file for you, copy
                      the contents below and create a .htaccess in your Anchor root folder.
        <textarea id="htaccess"><?= $htaccess; ?></textarea></p>

      <script>document.getElementById( 'htaccess' ).select();</script>
    <?php endif; ?>

  <section class="options">
    <a href="<?= $admin_uri; ?>" class="button">Visit your admin panel</a>
    <a href="<?= $site_uri; ?>" class="right">Visit your new site</a>
  </section>
</section>

<?= $footer; ?>
