<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=yes">
    <meta name="author" content="nivcoo">
    <meta name="keywords" content="">
    <title><?= $title_for_layout; ?> - <?= $website_name ?></title>
    <link rel="icon" type="image/png" href="<?= $theme_config['favicon_url'] ?>"/>
    <!-- CSS -->
    <?= $this->Html->css('global.css'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <!-- JavaScript -->
    <?= $this->Html->script('jquery-1.11.0.js') ?>
    <?= $this->Html->script('jquery.cookie.js') ?>
</head>
<body>


<?= $this->element('color') ?>
<div style="position: relative;min-height: 100vh;">
    <div style="padding-bottom: 7rem;  ">
        <?= $this->element('navbar') ?>
        <div class="mt-4">
        <?= $this->fetch('content'); ?>
        </div>
    </div>
    <?= $this->element('footer') ?>
    <?= $this->element('modals') ?>
</div>

<?= $this->Html->script('app.js') ?>
<?= $this->Html->script('form.js') ?>
<?= $this->Html->script('notification.js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    <?php if($isConnected) { ?>
    var notification = new $.Notification({
        'url': {
            'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
            'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
            'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
            'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
            'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
        },
        'messages': {
            'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
            'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
        }
    });
    <?php } ?>
    var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
    var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

    var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
    var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
    var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
    var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
    var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

    var CSRF_TOKEN = "<?= $csrfToken ?>";
</script>
<script>

    $(function($) {
        $("#loader").fadeOut(1000);

    })
</script>
<?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?= $google_analytics ?>', 'auto');
        ga('send', 'pageview');
    </script>


<?php } ?>
<?= $configuration_end_code ?>
</body>
</html>
