<?= $header; ?>

<section class="login content">

    <?php $user = filter_var(Input::previous('user'), FILTER_SANITIZE_STRING); ?>

  <form method="post" action="<?= Uri::to('admin/login'); ?>">
    <input name="token" type="hidden" value="<?= $token; ?>">

    <fieldset>
      <p><label for="label-user"><?= __('users.username'); ?>:</label>
          <?= Form::text('user', $user, [
              'id'             => 'label-user',
              'autocapitalize' => 'off',
              'autofocus'      => 'true',
              'placeholder'    => __('users.username')
          ]); ?></p>

      <p><label for="label-pass"><?= __('users.password'); ?>:</label>
          <?= Form::password('pass', [
              'id'           => 'pass',
              'placeholder'  => __('users.password'),
              'autocomplete' => 'off'
          ]); ?></p>

      <p class="buttons"><a
          href="<?= Uri::to('admin/amnesia'); ?>"><?= __('users.forgotten_password'); ?></a>
        <button type="submit"><?= __('global.login'); ?></button>
      </p>
    </fieldset>
  </form>

</section>

<?= $footer; ?>
