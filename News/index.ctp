<section id="box">
    <div class="container" id="news-page">
        <h1 class="title mb-0"><?= before_display($news['News']['title']) ?></h1>
        <div class="body">
            <?= $news['News']['content'] ?>
            <br>
            <br>
            <div class="credit"><?= $news['News']['author'] ?>
                <button style="border-radius:0px;border:none;background-color:#337ab7" id="<?= $news['News']['id'] ?>"
                        type="button"
                        class="btn btn-primary like<?= ($news['News']['liked']) ? ' active' : '' ?>"
                    <?= (!$Permissions->can('LIKE_NEWS')) ? ' disabled' : '' ?>><?= $news['News']['count_likes'] ?> <i
                            class="fa fa-thumbs-up"></i></button>
            </div>
            <div class="updated"><?= $Lang->date($news['News']['updated']) ?></div>

        </div>

    </div>
</section>
<?= $Module->loadModules('news') ?>

