<?php if (Auth::user()): ?>
  <footer class="wrap bottom">
    <small><?= __('global.powered_by_anchor', VERSION); ?></small>
    <em><?= __('global.make_blogging_beautiful'); ?></em>
  </footer>

  <script>
    // Confirm any deletions
    $( '.delete' ).on( 'click', function () {
      return confirm( '<?= __('global.confirm_delete'); ?>' );
    } );
  </script>
<?php endif; ?>
</body>
</html>
