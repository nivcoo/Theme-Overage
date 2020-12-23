<section id="footer">

    <section id="footer-up">
        <div class="container">
            <div class="col-sm-6 offset-sm-3">
                <div class="row">
                    <?php
                    $facebook_link = $theme_config['footer']->facebook_link;
                    $twitter_link = $theme_config['footer']->twitter_link;
                    $youtube_link = $theme_config['footer']->youtube_link;
                    $skype_link = $theme_config['footer']->skype_link;
                    $i = 0;
                    $col = 0;
                    if (!empty($facebook_link)) $i++;
                    if (!empty($twitter_link)) $i++;
                    if (!empty($youtube_link)) $i++;
                    if (!empty($skype_link)) $i++;

                    $col = 12 / $i;

                    if (!empty($facebook_link))
                        echo '<div class="col-' . $col . ' text-center"><a class="s-icons" href="' . $facebook_link . '"><i class="icon-social-facebook"></i></a></div>';
                    if (!empty($twitter_link))
                        echo '<div class="col-' . $col . ' text-center"><a class="s-icons" href="' . $twitter_link . '"><i class="icon-social-twitter"></i></a></div>';
                    if (!empty($youtube_link))
                        echo '<div class="col-' . $col . ' text-center"><a class="s-icons" href="' . $youtube_link . '"><i class="icon-social-youtube"></i></a></div>';
                    if (!empty($skype_link))
                        echo '<div class="col-' . $col . ' text-center"><a class="s-icons" href="' . $skype_link . '"><i class="icon-social-skype"></i></a></div>';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-by">
        <div id="particles-js-footer"></div>
        <div class="container">
            <div class="row">
                <div class="col-6 footer">
                    Copyright &copy; <?php echo date('Y'); ?>
                    <a href=""><?= $website_name ?></a> -
                    Thème créé par <a href="https://nivcoo.fr" target="_blank">nivcoo</a>
                </div>
                <div class="col-6 footer text-right">
                    Propulsé par <a href="http://mineweb.org" target="_blank">MineWeb</a>
                </div>
            </div>
        </div>
    </section>
</section>