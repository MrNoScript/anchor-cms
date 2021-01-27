<?= $header; ?>

<header class="wrap">
  <h1><?= __('menu.menu', 'Menu'); ?></h1>
</header>

<section class="wrap">

    <?php if (count($pages)): ?>
      <ul class="sortable">
          <?php foreach ($pages as $page): ?>
            <li class="item" draggable="true">
              <span data-id="<?= $page->id; ?>"><?= $page->name; ?></span>
            </li>
          <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="empty">
        <span class="icon"></span>
        No menu items yet.
      </p>
    <?php endif; ?>
</section>

<script src="<?= asset('anchor/views/assets/js/sortable.js'); ?>"></script>
<script>
  $( '.sortable' ).sortable(
    {
      element: 'li',
      dropped: function () {
        var data = { sort: [] };

        $( '.sortable span' ).each( function ( index, item ) {
          data.sort.push( $( item ).data( 'id' ) );
        } );

        $.ajax( {
                  'type': 'POST',
                  'url':  '<?= Uri::to("admin/menu/update"); ?>',
                  'data': $.param( data )
                } );
      }
    }
  );
</script>

<?= $footer; ?>
