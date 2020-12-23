<section id="box">
    <div class="container" id="profile">
        <h1 class="title mb-0"><?= $Lang->get('USER__PROFILE') ?></h1>
        <div class="body">
            <div class="step2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3" style="text-align: center;">
                            <img src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $user['pseudo'], 150 . '.png')) ?>"
                                 style="margin: 20px;">
                            <h2><?= $user['pseudo'] ?></h2>
                        </div>
                        <div class="col-md-9">
                            <?= $Module->loadModules('user_profile') ?>
                            <?= $Module->loadModules('user_profile_messages') ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="TwoFA-tab" data-toggle="tab" href="#TwoFA" role="tab"
                                       aria-controls="TwoFA" aria-selected="false">Double Authentification</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="form mt-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><?= $Lang->get('IP') ?></label>
                                                <input type="text" placeholder="<?= $user['ip'] ?>"
                                                       class="form-control" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?= $Lang->get('USER__USERNAME') ?></label>
                                                <input type="text" placeholder="<?= $user['pseudo'] ?>"
                                                       class="form-control" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?= $Lang->get('USER__EMAIL') ?></label>
                                                <input type="text" placeholder="<?= $user['email'] ?>"
                                                       class="form-control" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label><?= $Lang->get('USER__RANK') ?></label>
                                                <input type="text"
                                                       placeholder="<?php foreach ($available_ranks as $key => $value) {
                                                           if ($user['rank'] == $key) {
                                                               echo $value;
                                                           }
                                                       } ?>"
                                                       class="form-control" disabled>
                                            </div>

                                            <?php if ($EyPlugin->isInstalled('eywek.shop')) { ?>
                                                <div class="col-md-6">
                                                    <label><?= $Lang->get('USER__MONEY') ?></label>
                                                    <input type="text" placeholder="<?= $user['money'] ?>"
                                                           class="form-control" disabled>
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-6">
                                                <label><?= $Lang->get('GLOBAL__CREATED') ?></label>
                                                <input type="text" placeholder="<?= $Lang->date($user['created']) ?>"
                                                       class="form-control" disabled>
                                            </div>
                                        </div>


                                        <h3><?= $Lang->get('USER__UPDATE_PASSWORD') ?></h3>

                                        <form method="post" class="form-inline" data-ajax="true"
                                              action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">
                                            <div class="ajax-msg w-100"></div>
                                            <div class="form-group w-100">
                                                <input type="password" name="password" id="password"
                                                       placeholder="<?= $Lang->get('USER__PASSWORD') ?>"
                                                       class="form-control"
                                                       style="width:49.5%;display: inline;">
                                                <input type="password" name="password_confirmation"
                                                       id="password_confirmation"
                                                       placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM') ?>"
                                                       class="form-control" style="width:49.5%;display: inline;">
                                                <button
                                                        class="form-control send w-100"
                                                        type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                            </div>
                                        </form>

                                        <?php if ($Permissions->can('EDIT_HIS_EMAIL')) { ?>
                                            <hr>

                                            <h3><?= $Lang->get('USER__UPDATE_EMAIL') ?></h3>

                                            <form method="post" class="form-inline" data-ajax="true"
                                                  action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">
                                                <div class="ajax-msg w-100"></div>
                                                <div class="form-group w-100">
                                                    <input type="email" name="email" id="email"
                                                           placeholder="<?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?>"
                                                           class="form-control"
                                                           style="width:49.5%;display: inline;">
                                                    <input type="email" name="email_confirmation"
                                                           id="email_confirmation"
                                                           placeholder="<?= $Lang->get('USER__EMAIL') ?>"
                                                           class="form-control" style="width:49.5%;display: inline;">
                                                    <button class="form-control send w-100"
                                                            type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                                </div>
                                            </form>
                                        <?php } ?>

                                        <?php if ($shop_active) { ?>

                                            <hr>
                                            <h3><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>
                                            <form method="post" class="form-inline" data-ajax="true"
                                                  action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">
                                                <div class="ajax-msg w-100"></div>
                                                <div class="form-group w-100">
                                                    <input type="text" name="to" id="to"
                                                           placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?>"
                                                           class="form-control"
                                                           style="width:49.5%;display: inline;">
                                                    <input type="text" name="how" id="how"
                                                           placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?>"
                                                           class="form-control" style="width:49.5%;display: inline;">

                                                    <button
                                                            class="form-control send w-100"
                                                            type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                                </div>


                                            </form>


                                        <?php } ?>

                                        <?php if ($can_skin) { ?>
                                            <hr>

                                            <h3><?= $Lang->get('API__SKIN_LABEL') ?></h3>

                                            <form class="form-inline" method="post" id="skin" method="post"
                                                  data-ajax="true"
                                                  data-upload-image="true"
                                                  action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
                                                <div class="form-group">
                                                    <label><?= $Lang->get('FORM__BROWSE') ?></label>
                                                    <input name="image" type="file">
                                                </div>
                                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                                <button style="border-radius:0px;border:none;background-color:#337ab7"
                                                        type="submit"
                                                        class="btn btn-default"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                                </button>
                                                <br>
                                                <div class="form-group">
                                                    <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

                                                    - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
                                                    - <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX'))
                                                    ?><br>
                                                    - <?= str_replace('{PIXELS}', $skin_height_max, $Lang->
                                                    get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
                                                </div>
                                            </form>
                                        <?php } ?>

                                        <?php if ($can_cape) { ?>
                                            <hr>

                                            <h3><?= $Lang->get('API__CAPE_LABEL') ?></h3>

                                            <form class="form-inline" method="post" id="cape" method="post"
                                                  data-ajax="true"
                                                  data-upload-image="true"
                                                  action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
                                                <div class="form-group">
                                                    <label><?= $Lang->get('FORM__BROWSE') ?></label>
                                                    <input name="image" type="file">
                                                </div>
                                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                                <button style="border-radius:0px;border:none;background-color:#337ab7"
                                                        type="submit"
                                                        class="btn btn-default"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                                </button>
                                                <br>
                                                <div class="form-group">
                                                    <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

                                                    - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
                                                    - <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX'))
                                                    ?><br>
                                                    - <?= str_replace('{PIXELS}', $cape_height_max, $Lang->
                                                    get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="TwoFA" role="tabpanel" aria-labelledby="TwoFA-tab">
                                    <div class="callout mt-4" id="twoFactorAuthStatus">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <a id="toggleTwoFactorAuth"
                                                   data-status="<?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? '1' : '0' ?>"
                                                   class="btn btn-info">Voulez-vous <span
                                                            id="twoFactorAuthStatusInfos"><?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? 'désactiver' : 'activer' ?></span>
                                                    la double authentification ?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="twoFactorAuthValid" class="text-center mt-4" style="display: none;">
                                        <img src="" id="two-factor-auth-qrcode" alt=""/>
                                        <p>
                                            <small class="text-muted">Secret : <em
                                                        id="two-factor-auth-secret"></em></small>
                                        </p>

                                        <form class="form-horizontal" method="POST" data-ajax="true"
                                              action="<?= $this->Html->url(array('admin' => false, 'controller' => 'Authentification', 'action' => 'validEnable')) ?>"
                                              data-callback-function="afterValidQrCode">
                                            <div class="ajax-msg"></div>

                                            <div class="form-group text-center">
                                                <label><?= $Lang->get('USER__LOGIN_CODE') ?></label>
                                                <div class="col-md-6" style="margin: 0 auto;float: none;">
                                                    <input type="text" class="form-control" name="code"
                                                           placeholder="<?= $Lang->get('USER__LOGIN_CODE_PLACEHOLDER') ?>">
                                                </div>
                                            </div>

                                            <button type="submit"
                                                    class="btn btn-info"><?= $Lang->get('USER__VALID_CODE') ?></button>
                                        </form>
                                    </div>
                                    <script type="text/javascript">
                                        $('#toggleTwoFactorAuth').on('click', function (e) {
                                            e.preventDefault()
                                            var btn = $(this)
                                            var status = parseInt(btn.attr('data-status'))
                                            // disable
                                            btn.html('<i class="fa fa-refresh fa-spin"></i>').addClass('disabled')
                                            // request to server
                                            if (!status) { // enable
                                                $.get('<?= $this->Html->url(array('controller' => 'Authentification', 'action' => 'generateSecret')) ?>', function (data) {
                                                    // add qrcode
                                                    $('#two-factor-auth-qrcode').attr('src', data.qrcode_url)
                                                    $('#two-factor-auth-secret').html(data.secret)
                                                    // edit display
                                                    $('#twoFactorAuthStatus').slideUp(150)
                                                    $('#twoFactorAuthValid').slideDown(150)
                                                })
                                            } else { // disable
                                                $.get('<?= $this->Html->url(array('controller' => 'Authentification', 'action' => 'disable')) ?>', function (data) {
                                                    // edit display
                                                    $('#toggleTwoFactorAuth').html('Voulez-vous activer la double authentification ?').removeClass('disabled').removeClass('btn-primary').addClass('btn-primary').attr('data-status', 0)
                                                    $('#twoFactorAuthStatusInfos').html('activer')
                                                })
                                            }
                                        })

                                        function afterValidQrCode(req, res) {
                                            // edit display
                                            $('#toggleTwoFactorAuth').html('Voulez-vous désactiver la double authentification ?').removeClass('disabled').removeClass('btn-primary').addClass('btn-primary').attr('data-status', 1)
                                            $('#twoFactorAuthStatusInfos').html('désactiver')
                                            $('#twoFactorAuthValid').slideUp(150)
                                            $('#twoFactorAuthStatus').slideDown(150)
                                        }
                                    </script>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
