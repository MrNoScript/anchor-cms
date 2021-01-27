<?= $header; ?>

  <section class="login content">
    <form method="post" action="<?= Uri::to('admin/amnesia'); ?>">
      <input name="token" type="hidden" value="<?= $token; ?>">

      <fieldset>
        <p><label for="label-email"><?= __('users.email'); ?>:</label>
            <?= Form::email('email', Input::previous('email'), [
                'id'             => 'label-email',
                'autocapitalize' => 'off',
                'autofocus'      => 'true',
                'placeholder'    => __('users.email')
            ]); ?></p>

        <p class="buttons">
          <a href="<?= Uri::to('admin/login'); ?>"><?= __('users.remembered'); ?></a>
          <button type="submit"><?= __('global.reset'); ?></button>
        </p>
      </fieldset>
    </form>

  </section>

<?= $footer; ?>
