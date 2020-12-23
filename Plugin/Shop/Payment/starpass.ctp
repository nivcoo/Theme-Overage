<section id="boutique">
	<div class="shop-up" style="background: url(/theme/Tactil/img/slider.png) no-repeat ;">
		<div class="container">
			<div class="row">
				<div class="box-center">
					<div class="title">
					<?= $Lang->get('SHOP__STARPASS_PAYMENT') ?>
					</div>
					<div class="subtitle">
					1 code = <?= $money ?> <?= $Configuration->getMoneyName() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						 <div id="starpass_<?= $idd ?>"></div>
						  <script type="text/javascript" src="//script.starpass.fr/script.php?idd=<?= $idd ?>&amp;verif_en_php=1&amp;datas=<?= $id ?>"></script>
						  <noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
							<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
						  </noscript>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
