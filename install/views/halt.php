<?= $header; ?>

  <section class="content">
    <article>
      <h1>Woops!</h1>

        <?php if (count($errors) > 1): ?>
          <ul>
              <?php foreach ($errors as $error): ?>
                <li><?= $error; ?></li>
              <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p><?= current($errors); ?></p>
        <?php endif; ?>

      <p class="options">
        <a class="btn" href="<?= uri_to('start'); ?>">Let&apos;s try that again.</a>
      </p>
    </article>
  </section>

<?= $footer; ?>
