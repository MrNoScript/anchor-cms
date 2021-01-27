<?php foreach ($fields as $field): ?>
  <p>
    <label for="extend_<?= $field->key; ?>"><?= $field->label; ?>:</label>
      <?= Extend::html($field); ?>
  </p>
<?php endforeach; ?>
