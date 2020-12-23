


<div class="jumbotron jumbotron-fluid text-center m-5">
    <div class="container">
        <h1 class="display-3 title"><?= (isset($Lang)) ? $Lang->get('ERROR__500_LABEL') : '500 Error' ?></h1>
        <p class="lead"><?= (isset($Lang)) ? $Lang->get('ERROR__INTERNAL_ERROR') : 'For know reason of this error, please change <pre>Configure::write(\'debug\', 0);</pre> to <pre>Configure::write(\'debug\', 3);</pre> in file <b>app/Config/core.php</b> line 34.' ?></p>
    </div>
</div>
