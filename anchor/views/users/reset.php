<?= $header; ?>

  <section class="login content">
    <form method="post" action="<?= Uri::to('admin/reset/' . $key); ?>">
      <input name="token" type="hidden" value="<?= $token; ?>">

      <fieldset>
        <p><label for="label-pass"><?= __('users.new_password'); ?>:</label>
            <?= Form::password('pass', ['placeholder' => __('users.new_password'), 'id' => 'label-pass']); ?></p>
        <p class="buttons">
            <?= Form::button(__('global.submit'), ['type' => 'submit']); ?>
        </p>
      </fieldset>
    </form>
  </section>

<?= $footer; ?>
