            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">

                    <a href="<?= base_url() ?>" class="navbar-brand mb-0 h1">
                        Uneed2Cook
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="navbar-nav ml-auto my-2 my-lg-0">

                            <?php if (has_menu_items()): while (menu_items()): ?>
                                <li class="nav-item <?= menu_active() ? 'active' : ''; ?>">
                                    <a class="nav-link" href="<?= menu_url(); ?>" title="<?= menu_title(); ?>">
                                        <?= menu_name(); ?>
                                    </a>
                                </li>
                            <?php endwhile; endif; ?>
                            
                            <?php if( user_authed() ): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('admin'); ?>" title="Administer your site!">Admin area</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
