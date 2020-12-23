<?php
$form_input = array('title' => 'Envoyer votre image');

if (isset($config['logo']) && $config['logo']) {
    $form_input['img'] = $config['logo'];
    $form_input['filename'] = 'theme_logo.png';
}

echo $this->Html->script('admin/tinymce/tinymce.min.js');

?>
<section class="content">

    <form method="post" enctype="multipart/form-data" data-ajax="false">

        <div class="card">
            <div class="card-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link text-dark active" href="#config-accueil"
                                                data-toggle="tab">Général et Accueil</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="#config-footer"
                                                data-toggle="tab">Footer</a>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding: 15px;">
                        <div class="tab-pane fade show active" id="config-accueil">
                            <div class="row">
                                <div class="box-body" style="">
                                    <div class="form-group">
                                        <label>Address IP du serveur</label>
                                        <input type="text" name="global[ip]" class="form-control"
                                               value="<?= $config['global']->ip ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Url du Slider</label>
                                        <input type="text" name="global[slider]" class="form-control"
                                               value="<?= $config['global']->slider ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Url du Logo</label>
                                        <em>Si vous mettez un logo l'article d'en dessous ne sera plus affiché !</em>
                                        <input type="text" name="global[logo_url]" class="form-control"
                                               value="<?= $config['global']->logo_url ?>">
                                    </div>


                                    <?php if ($EyPlugin->isInstalled('eywek.shop')) {

                                        $url = "/";
                                        $get_item = ClassRegistry::init('Shop.Items')->find('all');


                                        if (isset($get_item)) { ?>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Sélectionnez votre article à
                                                    afficher sur
                                                    l'accueil</label>
                                                <select class="form-control" name="global[article_shop]">
                                                    <?php if (!$get_item) { ?>
                                                        <option value="0">Aucun item détecté</option>
                                                    <?php } else {
                                                        foreach ($get_item as $v) { ?>

                                                            <option value="<?= $v['Items']['id'] ?>" <?= (isset($config['global']->article_shop) && $config['global']->article_shop ==
                                                                $v['Items']['id']) ? "selected" : "" ?>><?= $v['Items']['name'] ?></option>

                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-danger"><b>Erreur :</b> Vous n'avez aucun article
                                                sur la boutique
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="alert alert-danger"><b>Erreur :</b> Le plugin shop n'est pas
                                            installé.
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label>Couleur Principale du site (défaut : #212121)</label>
                                        <input class="form-control" type="color" value="<?= $config['global']->color ?>"
                                               name="global[color]">
                                    </div>
                                    <br>
                                    <h1>Section</h1>
                                    <div class="form-group">
                                        <label>Titre</label>
                                        <input type="text" name="global[section_title]" class="form-control"
                                               value="<?= $config['global']->section_title ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Sous Titre</label>
                                        <input type="text" name="global[section_desc]" class="form-control"
                                               value="<?= $config['global']->section_desc ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Section Droite</label>
                                        <div class="row">
                                            <div class="col">
                                                <label>Ligne 1</label>
                                                <input type="text" class="form-control" name="global[section][one][desc]"
                                                       placeholder="Description"
                                                       value="<?= $config['global']->section->one->desc ?>"><br>
                                                <input type="text" class="form-control" name="global[section][one][icon]"
                                                       placeholder="Icon FontAwesome 5"
                                                       value="<?= $config['global']->section->one->icon ?>">
                                            </div>
                                            <div class="col">
                                                <label>Ligne 2</label>
                                                <input type="text" class="form-control" name="global[section][two][desc]"
                                                       placeholder="Description"
                                                       value="<?= $config['global']->section->two->icon ?>"><br>
                                                <input type="text" class="form-control" name="global[section][two][icon]"
                                                       placeholder="Icon FontAwesome 5"
                                                       value="<?= $config['global']->section->two->icon ?>">
                                            </div>
                                            <div class="col">
                                                <label>Ligne 3</label>
                                                <input type="text" class="form-control" name="global[section][three][desc]"
                                                       placeholder="Description"
                                                       value="<?= $config['global']->section->three->icon ?>"><br>
                                                <input type="text" class="form-control" name="global[section][three][icon]"
                                                       placeholder="Icon FontAwesome 5"
                                                       value="<?= $config['global']->section->three->icon ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success"
                                            type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="config-footer">
                            <div class="row">
                                <div class="box-body" style="">
                                    <h1>Reseau Sociaux</h1>
                                    <div class="row">
                                        <div class="col">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" name="footer[facebook_link]" placeholder="Facebook url" value="<?= $config['footer']->facebook_link ?>"><br>
                                        </div>
                                        <div class="col">
                                            <label>Twitter</label>
                                            <input type="text" class="form-control" name="footer[twitter_link]" placeholder="Twitter url" value="<?= $config['footer']->twitter_link ?>"><br>
                                        </div>
                                        <div class="col">
                                            <label>Youtube</label>
                                            <input type="text" class="form-control" name="footer[youtube_link]" placeholder="Youtube url" value="<?= $config['footer']->youtube_link ?>"><br>
                                        </div>
                                        <div class="col">
                                            <label>Skype</label>
                                            <input type="text" class="form-control" name="footer[skype_link]" placeholder="Skype url" value="<?= $config['footer']->skype_link ?>"><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success"
                                            type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</section>
