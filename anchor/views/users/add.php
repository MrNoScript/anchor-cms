<?= $header; ?>

<header class="wrap">
  <h1><?= __('users.add_user'); ?></h1>
</header>

<section class="wrap">

    <?php if (Auth::admin()) : ?>

      <form
        method="post" action="<?= Uri::to('admin/users/add'); ?>"
        novalidate
        autocomplete="off"
        enctype="multipart/form-data"
      >
        <input name="token" type="hidden" value="<?= $token; ?>">

        <fieldset class="half split">
          <p>
            <label for="label-real_name"><?= __('users.real_name'); ?>:</label>
              <?= Form::text('real_name', Input::previous('real_name'), ['id' => 'label-real_name']); ?>
            <em><?= __('users.real_name_explain'); ?></em>
          </p>
          <p>
            <label for="label-bio"><?= __('users.bio'); ?>:</label>
              <?= Form::textarea('bio', Input::previous('bio'), ['cols' => 20, 'id' => 'label-bio']); ?>
            <em><?= __('users.bio_explain'); ?></em>
          </p>
          <p>
            <label for="label-status"><?= __('users.status'); ?>:</label>
              <?= Form::select('status', $statuses, Input::previous('status'), ['id' => 'label-status']); ?>
            <em><?= __('users.status_explain'); ?></em>
          </p>
            <?php if (false) : ?>
              <p>
                <label for="label-role"><?= __('users.role'); ?>:</label>
                  <?= Form::select('role', $roles, Input::previous('role'), ['id' => 'label-role']); ?>
                <em><?= __('users.role_explain'); ?></em>
              </p>
            <?php endif; ?>
        </fieldset>

        <fieldset class="half split">
            <?php foreach ($fields as $field): ?>
              <p>
                <label for="extend_<?= $field->key; ?>"><?= $field->label; ?>:</label>
                  <?= Extend::html($field); ?>
              </p>
            <?php endforeach; ?>
          <p>
            <label for="label-username"><?= __('users.username'); ?>:</label>
              <?= Form::text('username', Input::previous('username'), ['id' => 'label-username']); ?>
            <em><?= __('users.username_explain'); ?></em>
          </p>
          <p>
            <label for="label-password"><?= __('users.password'); ?>:</label>
              <?= Form::password('password', ['id' => 'label-password']); ?>
            <em><?= __('users.password_explain'); ?></em>
          </p>
          <p>
            <label for="label-email"><?= __('users.email'); ?>:</label>
              <?= Form::text('email', Input::previous('email'), ['id' => 'label-email']); ?>
            <em><?= __('users.email_explain'); ?></em>
          </p>
        </fieldset>

        <aside class="buttons">
            <?= Form::button(__('global.create'), ['class' => 'btn', 'type' => 'submit']); ?>

            <?= Html::link('admin/users', __('global.cancel'), ['class' => 'btn cancel blue']); ?>
        </aside>
      </form>
    <?php else : ?>
      <p>You do not have the required privileges to add users, you must be an Administrator. Please contact the
         Administrator of the site if you are supposed to have these privileges.</p>
      <br><a class="btn" href="<?= Uri::to('admin/users'); ?>">Go back</a>
    <?php endif; ?>
</section>

<script src="<?= asset('anchor/views/assets/js/upload-fields.js'); ?>"></script>

<?= $footer; ?>
