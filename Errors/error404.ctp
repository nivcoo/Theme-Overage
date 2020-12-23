<div class="jumbotron jumbotron-fluid text-center m-5">
    <div class="container">
        <h1 class="display-3 title"><?= $Lang->get('ERROR__404_LABEL') ?></h1>
        <p class="lead"><?php
            $msg = $Lang->get('ERROR__404_CONTENT');
            $msg = str_replace('{URL}', $url, $msg);
            echo $msg;
            ?></p>
    </div>
</div>