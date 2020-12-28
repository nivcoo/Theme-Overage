<section id="box">
    <div class="container" id="users_login">
        <a class="title text-dark"><?= $Lang->get('USER__REGISTER') ?></a>
        <div class="body">
            <div id="fetch-message"></div>
            <form method="post" data-redirect-url="?" data-ajax="true"
                  action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_register')) ?>">
                <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>"/>
                <div class="row">
                    <div class="col-md-6">
                        <label><?= $Lang->get('USER__USERNAME_LABEL') ?></label>
                        <input class="form-control" name="pseudo"
                               placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>" type="text" autofocus/>
                    </div>
                    <div class="col-md-6">
                        <label><?= $Lang->get('USER__EMAIL_LABEL') ?></label>
                        <input class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>"
                               type="text" autofocus/>
                    </div>
                    <div class="col-md-6">
                        <label><?= $Lang->get('USER__PASSWORD_LABEL') ?></label>
                        <input class="form-control" name="password"
                               placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>" type="password" autofocus/>
                    </div>
                    <div class="col-md-6">
                        <label><?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?></label>
                        <input class="form-control" name="password_confirmation"
                               placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>" type="password"
                               autofocus/>
                    </div>

                    <div class="col-md-6 mt-3">
                        <?php if ($captcha['type'] == "google") { ?>
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="form-group">
                                <h5><?= $Lang->get('FORM__CAPTCHA') ?></h5>
                                <div class="g-recaptcha" data-sitekey="<?= $captcha['siteKey'] ?>"></div>
                            </div>

                        <?php } else if ($captcha['type'] == "hcaptcha") { ?>
                            <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
                            <div class="form-group">
                                <h5><?= $Lang->get('FORM__CAPTCHA') ?></h5>
                                <div class="h-captcha" data-sitekey="<?= $captcha['siteKey'] ?>"></div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <?= $this->Html->image(array('controller' => 'user', 'action' => 'get_captcha', 'plugin' => false, 'admin' => false), array('plugin' => false, 'admin' => false, 'id' => 'captcha_image')); ?>
                                <a href="javascript:void(0);" id="reload"><i class="fa fa-refresh"></i></a>
                            </div>
                            <div class="form-group">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                    class="fa fa-eye"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="captcha" id="inputPassword3"
                                           placeholder="<?= $Lang->get('FORM__CAPTCHA_LABEL') ?>">
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <br>
                <?php if (!empty($condition)) { ?>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="condition">
                                <?= $Lang->get('USER__CONDITION_1') ?> <a
                                        href="<?= $condition ?>"> <?= $Lang->get('USER__CONDITION_2') ?></a>
                            </label>
                        </div>
                    </div>
                <?php } ?>
                <input type="submit" name="send" id="send_register" class="form-control send"
                       value="<?= $Lang->get('USER__REGISTER') ?>">
            </form>
        </div>
    </div>
</section>
