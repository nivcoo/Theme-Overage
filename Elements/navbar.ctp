<section id="navbarTitle">
    <div id="particles-js"></div>
    <div class="row" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-lg-4 text-center">
            <div class="boxUp">
                <?php if (!$isConnected): ?>
                    <?php if ($EyPlugin->isInstalled('phpierre.signinup')) { ?>
                        <a href="/register" class="btn btn-register">INSCRIPTION</a>
                        <a href="/login" class="btn btn-login">CONNEXION</a>
                    <?php } else { ?>
                        <a href="#register" data-toggle="modal" class="btn btn-register">INSCRIPTION</a>
                        <a href="#login" data-toggle="modal" class="btn btn-login">CONNEXION</a>
                    <?php } ?>
                <?php else: ?>
                    <a class="btn"
                       href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>">
                        Profil &nbsp;&nbsp; <i class="fa fa-user"></i>
                    </a>
                    <a class="btn" href="#notifications_modal" onclick="notification.markAllAsSeen(2)"
                       data-toggle="modal">
                        Notifications &nbsp;&nbsp; <i class="fa fa-flag"></i>
                        <span class="notification-indicator" style="position: absolute;top: 18px; color:#dc3545"></span>
                    </a>
                    <?php if ($Permissions->can('ACCESS_DASHBOARD')) : ?>
                        <a class="btn"
                           href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i
                                    class="fa fa-cogs"></i>
                        </a>
                    <?php endif; ?>

                    <a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"
                       class="btn"><i class="fa fa-power-off"></i></a>

                <?php endif; ?>

            </div>
        </div>
        <div class="col-lg-4 text-center title-box">
            <a href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => '')) ?>"
               class="title"><?= $website_name ?></a>
        </div>
        <div class="col-lg-4 text-center">
            <div class="boxUp">
                <a id="copy-ip" data-clipboard-text="<?= $theme_config['global']->ip ?>" aria-hidden="true" style="cursor: pointer,"
                   class="btn btn-ip"><?= $theme_config['global']->ip ?></a>
                <?= $this->Html->script('clipboard') ?>
                <script>
                    new Clipboard('#copy-ip');
                </script>
            </div>
        </div>
    </div>
</section>
<section id="navbar-section">
    <div class="row" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-lg-3 text-center">
            <a class="nav-link js-scroll-trigger online-box">
                <?= $server_infos['GET_PLAYER_COUNT'] ?>
                Joueur<?php if ($server_infos['GET_PLAYER_COUNT'] >= 2) echo 's'; ?>
            </a>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
                <button class="navbar-toggler navbar-toggler-right icon-nav" type="button" data-toggle="collapse"
                        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation">
                    Navigation &nbsp;&nbsp; <i class="fa fa-bars icon"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" aria-expanded="true">
                    <ul class="navbar-nav nav-main">


                        <?php if (!empty($nav)): ?>
                            <?php $i = 0; ?>
                            <?php foreach ($nav as $key => $value): ?>
                                <?php if (empty($value['Navbar']['submenu'])): ?>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger" href="<?= $value['Navbar']['url'] ?>">
                                            <?php if (!empty($value['Navbar']['icon'])): ?>
                                                <i class="<?= $value['Navbar']['icon'] ?>"></i>
                                            <?php endif; ?>
                                            <?= $value['Navbar']['name'] ?>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a href="#" class="nav-link js-scroll-trigger" data-toggle="dropdown"
                                           role="button"
                                           aria-expanded="false">
                                            <?php if (!empty($value['Navbar']['icon'])): ?>
                                                <i class="<?= $value['Navbar']['icon'] ?>"></i>
                                            <?php endif; ?>
                                            <?= $value['Navbar']['name'] ?>
                                            <i class="fa fa-angle-down">
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php
                                            $submenu = json_decode($value['Navbar']['submenu']);
                                            foreach ($submenu as $k => $v) {
                                            ?>
                                            <a class="dropdown-item"
                                               href="<?= rawurldecode(rawurldecode($v)) ?>" <?= ($value['Navbar']['open_new_tab']) ? 'target="_blank"' : '' ?>>
                                                <?= rawurldecode(str_replace('+', ' ', $k)) ?>
                                            </a>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>