<section id="box">
    <div class="container" id="users_login">

        <a class="title text-dark"><?= $Lang->get('USER__LOGIN') ?></a>
        <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>"/>
        <div id="login-before-two-factor-auth" class="body">
            <form method="POST" data-ajax="true"
                  action="<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'User', 'action' => 'ajax_login')) ?>"
                  data-callback-function="afterLogin">

                <label><?= $Lang->get('USER__USERNAME_LABEL') ?></label>
                <input class="form-control" name="pseudo"
                       placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>" type="text" autofocus/>
                <div class="form-group">
                    <label><?= $Lang->get('USER__PASSWORD_LABEL') ?></label>
                    <input class="form-control" name="password"
                           placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>" type="password" autofocus/>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <input type="checkbox" name="remember_me">
                        <?= $Lang->get('USER__REMEMBER_ME') ?>
                    </div>
                </div>

                <div class="text-center mt-2">
                    <h6>
                        <a class="text-dark" data-dismiss="modal" href="#"
                           data-toggle="modal"
                           data-target="#lostpasswd">
                            <?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?>
                        </a>
                    </h6>
                </div>
                <input type="submit" name="send" id="send_login" class="form-control send"
                       value="<?= $Lang->get('USER__LOGIN') ?>">


            </form>
        </div>

        <div id="login-two-factor-auth" class="body" style="display:none;">
            <h1 class="h5 text-center"><?= $Lang->get('USER__LOGIN_CODE_PLACEHOLDER') ?></h1>
            <form method="POST" data-ajax="true"
                  action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'Authentification', 'action' => 'validLogin')) ?>"
                  data-redirect-url="?">
                <div class="form-group">
                    <input type="checkbox" style="display: none;" name="remember_me">
                    <input type="text" class="form-control" name="code"
                           placeholder="<?= $Lang->get('USER__LOGIN_CODE') ?>">
                </div>
                <button class="form-control send"
                        type="submit"><?= $Lang->get('USER__LOGIN') ?></button>
            </form>
        </div>

    </div>
</section>

<script type="text/javascript">
    function afterLogin(req, res) {
        if (res['two-factor-auth'] === undefined)
            return window.location = '?t_' + Date.now()
        $('#login-two-factor-auth input[name="remember_me"]').attr('checked', $('#login-before-two-factor-auth input[name="remember_me"]').is(':checked'))
        $('#login-before-two-factor-auth').slideUp(150)
        $('#login-two-factor-auth').slideDown(150)
    }
</script>