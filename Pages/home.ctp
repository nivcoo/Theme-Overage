<section id="sliderImage"
         style="margin-top: -1.5rem;background: url(<?php if (empty($theme_config['global']->slider)) echo '/theme/Overage/img/banniere.png'; else echo $theme_config['global']->slider; ?>) no-repeat fixed top;background-size: cover;background-position: center;">
    <div class="row" style="margin-right: 0px;margin-left: 0px;">

        <div class="col-xl-6 text-center">
            <div class="box-1 col-sm-4 offset-sm-4">
                <div class="box-up">
                    <?php if (!empty($theme_config['global']->logo_url)) { ?>
                        <img src="https://edensky.fr/img/uploads/theme_logo.png" style="padding-top: 4rem" width="250" alt="Logo">
                    <?php } else { ?>
                        <?php
                        $url = "/";

                        if ($EyPlugin->isInstalled('eywek.shop')) {

                            $id = intval($theme_config['global']->article_shop);
                            $id = 1;
                            $get_item = ClassRegistry::init('Shop.Items')->find('first', [
                                'conditions' => ['id' => $id]
                            ])['Items'];

                            if (isset($get_item)) {

                                $url = $this->Html->url(array('controller' => '', 'action' => 'c/' . $get_item['category'], 'plugin' => 'shop'));

                                ?>
                                <div class="price">
                                    <?= $get_item['price'] ?>
                                </div>
                                <img width="100%" src="<?= $get_item['img_url'] ?>">
                                <br>
                                <div class="title-box">
                                    <?= $get_item['name'] ?>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="alert alert-danger"><b>Erreur :</b> Le plugin shop n'est pas
                                installé.
                            </div>
                        <?php } ?>
                    <?php } ?>


                </div>
                <br>
                <?php if (empty($theme_config['global']->logo_url)) { ?>
                    <a href="<?= $url ?>" class="button-box">Voir plus</a>
                <?php } ?>
            </div>
        </div>
        <div class="col-xl-6 text-center">
            <div class="box-2 col-md-6 offset-md-3">
                <div class="title">
                    Votes
                </div>
                <?php
                if ($EyPlugin->isInstalled('eywek.vote')) {
                    $users_vote = ClassRegistry::init('Vote.Vote')->find('all', [
                        'fields' => ['username', 'COUNT(id) AS count'],
                        'conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%'],
                        'order' => 'count DESC',
                        'group' => 'username',
                        'limit' => 3
                    ]);
                    ?>
                    <div class="row">

                        <?php $rank = 1;
                        if (isset($users_vote)) {
                            foreach ($users_vote as $userv) { ?>
                                <div class="col-4">
                                    <div class="vote">
                                        <div class="title-votes">Top <?= $rank++ ?></div>
                                        <div class="vote-body">
                                            <img width="50" style="border-radius: 50%;"
                                                 src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $userv['Vote']['username'], 80 . '.png')) ?>"><br>
                                            <strong class="player-name"
                                                    style="text-transform: uppercase"><?= $userv['Vote']['username'] ?></strong>

                                            <div class="votes"><?= $userv[0]['count'] ?>
                                                vote<?= ($userv[0]['count'] > 1) ? 's' : '' ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger"><b>Erreur :</b> Le plugin vote n'est pas installé.</div>
                <?php } ?>
                <br>
                <a href="/vote" class="button-box">Cliquez pour Voter</a>
            </div>
        </div>
    </div>
    <svg viewBox="0 0 100 100" width="100%" height="50px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0 C16.6666667,66 33.3333333,98 50,98 C66.6666667,98 83.3333333,66 100,0 L100,100 L0,100 L0,0 Z" fill="#fff"></path></svg>
</section>
<section id="news">
    <div class="container">
        <div class="news-title text-center">
            Nouveautés !
        </div>
        <div class="row">

            <?php
            if (!empty($search_news)) {
                $i = 0;
                foreach ($search_news as $k => $v) {
                    $i++;
                    if ($i > 3) {
                        break;
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="news">
                            <div class="title-news"><?= $v['News']['title'] ?></div>
                            <div class="news-body">
                                <?= $this->Text->truncate($v['News']['content'], 400, array('ellipsis' => '...', 'html' => true)) ?>
                            </div>
                        </div>
                        <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"
                           class="button-box">Lire la suite</a>

                    </div>

                <?php }
            } else { ?>
                <div class="col-lg-12"><h4
                            style="font-family: 'Assistant', sans-serif;margin-top:40px"><?= "Aucune nouveauté" ?></h4>
                </div>
            <?php } ?>


        </div>
    </div>
</section>
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="title">
                    <?= $theme_config['global']->section_title ?>
                </div>
                <div class="subtitle">
                    <?= $theme_config['global']->section_desc ?>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-2">
                        <div class="icon">
                            <i class="<?= $theme_config['global']->section->one->icon ?> icon-2"></i>
                        </div>
                    </div>
                    <div class="col-10 desc">
                        <?= $theme_config['global']->section->one->desc ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                        <div class="icon">
                            <i class="<?= $theme_config['global']->section->two->icon ?> icon-2"></i>
                        </div>
                    </div>
                    <div class="col-10 desc">
                        <?= $theme_config['global']->section->two->desc ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                        <div class="icon">
                            <i class="<?= $theme_config['global']->section->three->icon ?> icon-2"></i>
                        </div>
                    </div>
                    <div class="col-10 desc">
                        <?= $theme_config['global']->section->three->desc ?>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>