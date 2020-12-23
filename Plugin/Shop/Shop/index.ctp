<section id="plugin-shop">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $vouchers->get_vouchers() ?>

                <div class="category_bar">
                    <ul class="nav">


                        <?php foreach ($search_sections as $v) { ?>

                            <li class="dropdown">
                                <a href="#" class="nav_item" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    <?= before_display($v['Section']['name']) ?>
                                    <i class="fa fa-angle-down">
                                    </i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php foreach ($search_categories_section[$v['Section']['id']] as $va) { ?>
                                        <a class="dropdown-item"
                                           href="<?= $this->Html->url(array('controller' => 'c/' . $va['Category']['id'], 'plugin' => 'shop')) ?>">
                                            <?= before_display($va['Category']['name']) ?>
                                        </a>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php foreach ($search_categories_without_section as $v) { ?>
                            <li>
                                <a class="nav_item"
                                   href="<?= $this->Html->url(array('controller' => 'c/' . $v['Category']['id'], 'plugin' => 'shop')) ?>"><?= before_display($v['Category']['name']) ?></a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <section id="box">
                    <a class="title text-dark"><?= ($isConnected) ? "Vous
                        avez " . $money : $Lang->get('SHOP__TITLE'); ?></a>
                    <div class="body">

                        <?php if ($isConnected) { ?>
                            <?php if (!empty($vagoal)) { ?>
                                <hr>
                                <div class="panel-heading text-center"><h3>
                                        <b><?= $Lang->get('SHOP__CONFIG_GOAL_TITLE') ?></b></h3></div>
                                <div class="progress">
                                    <div class="progress-bar-danger bg-info text-center" role="progressbar"
                                         style="<?= $vawidth ?>%">
                                        <b><?= $vawidth ?>%</b>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        <?php } else { ?>
                        <?php } ?>

                        <?php if ($isConnected) { ?>

                            <?php if ($Permissions->can('CREDIT_ACCOUNT')) { ?>
                                <a href="#" data-toggle="modal" data-target="#addmoney"
                                   class="btn button w-100 mt-2"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
                            <?php } ?>

                            <a href="#" data-toggle="modal" data-target="#cart-modal"
                               class="btn button w-100 mt-2"><?= $Lang->get('SHOP__BUY_CART') ?></a>
                        <?php } else { ?>
                            <button style="opacity: 1;" class="btn btn-block categories disabled">Vous êtes
                                déconnecté.
                            </button>
                        <?php } ?>

                        <?php if (!empty($goal_money_max)) { ?>

                            <hr>
                            <?= $Lang->get('SHOP__CONFIG_GOAL_TITLE') ?>
                            <div class="progress">
                                <div class="progress-bar active" role="progressbar"
                                     aria-valuenow="<?= $goal_bar_with ?>" aria-valuemin="0"
                                     aria-valuemax="100" style="width: <?= $goal_bar_with ?>%">
                                    <span class="sr-only"><?= $goal_bar_with ?>%</span>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>

                        Meilleurs acheteurs
                        <br>
                        <?php if ($best_donator) { ?>
                            <div class="row">
                                <?php $i = 0;
                                foreach ($best_donator as $v) {
                                    ++$i;
                                    if ($i == 3) break; ?>

                                    <div class="col-lg-4">
                                        <img src="<?= $this->Html->url(['controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $v['User']['pseudo'], 48]) ?>"
                                             width="100%" style="border-radius:50%;">
                                    </div>
                                    <div class="col-lg-8">
                                        <b><?= $v['User']['pseudo'] ?></b><br>
                                        #<?= $i ?><br>
                                    </div>

                                <?php } ?>
                            </div>

                        <?php } else { ?>
                            Aucun achat n'a encore été effectué.
                        <?php } ?>
                    </div>
                </section>
            </div>
            <div class="col-md-8">
                <div class="row article">

                    <?php
                    $i = 0;
                    foreach ($search_items as $k => $v) {
                        if (!isset($category) and $v['Item']['category'] == $search_first_category or isset($category) and $v['Item']['category'] == $category) {
                            $i++;
                            ?>


                            <div class="col-md-4 col-6">
                                <a <?php if (('CAN_BUY')) { ?> data-item-id="<?= $v['Item']['id'] ?>" <?php } ?> style="cursor: pointer" class="button-box display-item">
                                    <div class="price"><?= $v['Item']['price'] ?><?php if ($v['Item']['price'] == 1) {
                                            echo ' ' . $singular_money;
                                        } else {
                                            echo ' ' . $plural_money;
                                        } ?>
                                    </div>
                                    <img width="100%" src="<?= $v['Item']['img_url'] ?>">
                                    <br>
                                    <div class="title-box">
                                        <?= before_display($v['Item']['name']) ?>
                                    </div>
                                    <br>
                                </a>
                            </div>

                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    var LOADING_MSG = '<?= $Lang->get('GLOBAL__LOADING') ?>';
    var ADDED_TO_CART_MSG = '<?= $Lang->get('SHOP__BUY_ADDED_TO_CART') ?> <i class="fa fa-check"></i>';
    var CART_EMPTY_MSG = '<?= $Lang->get('SHOP__BUY_CART_EMPTY') ?>';
    var ITEM_GET_URL = '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/';
    var VOUCHER_CHECK_URL = '<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/';
    var BUY_URL = '<?= $this->Html->url(array('action' => 'buy_ajax')) ?>';

    var CART_ITEM_NAME_MSG = '<?= $Lang->get('SHOP__ITEM_NAME') ?>';
    var CART_ITEM_PRICE_MSG = '<?= $Lang->get('SHOP__ITEM_PRICE') ?>';
    var CART_ITEM_QUANTITY_MSG = '<?= $Lang->get('SHOP__ITEM_QUANTITY') ?>';
    var CART_ACTIONS_MSG = '<?= $Lang->get('GLOBAL__ACTIONS') ?>';

    var CSRF_TOKEN = '<?= $csrfToken ?>';
</script>
<?= $this->Html->script('Shop.jquery.cookie') ?>
<?= $this->Html->script('Shop.shop') ?>
<?= $this->Html->script('Shop.jquery.bootstrap-touchspin.js') ?>
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" id="boutique">
        <div class="modal-content">
            <div class="card-header">
                <button type="button" class="close" data-dismiss="modal"><i style="color:white"
                                                                            class="fa fa-window-minimize "></i><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CONFIRM') ?></h4>
            </div>

            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" id="boutique">
        <div class="modal-content">
            <div class="card-header">
                <button type="button" class="close" data-dismiss="modal"><i style="color:white"
                                                                            class="fa fa-window-minimize "></i><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CART') ?></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="card-footer">
                <div class="float-left">
                    <input name="cart-voucher" type="text" class="form-control" autocomplete="off" id="cart-voucher"
                           style="width:245px;" placeholder="<?= $Lang->get('SHOP__BUY_VOUCHER_ASK') ?>">
                </div>
                <button class="btn disabled"><?= $Lang->get('SHOP__ITEM_TOTAL') ?> : <span
                            id="cart-total-price">0</span> <?= $Configuration->getMoneyName() ?>
                </button>
                <button type="button" class="btn btn-success" id="buy-cart"><?= $Lang->get('SHOP__BUY') ?></button>
            </div>
        </div>
    </div>
</div>
<?= $this->element('payments_modal') ?>
