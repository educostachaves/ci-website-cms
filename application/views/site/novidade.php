
<section class="content-fluid inside-section" >
	<?php
	if (count($novidades) > 0 ) {
		foreach($novidades as $novidade) {
	?>
	<article class="col-sm-10 col-sm-offset-1 news-content">
		<div class="col-sm-12 content-news">
			<div class="row">
				<div class="col-md-12">
					<h3><?php echo $novidade->titulo; ?></h3>
				</div>
				<div class="col-md-6">
					<p class="text-left"><?php echo $novidade->autor; ?></p>
				</div>
				<div class="col-md-6">
					<p class="text-right"><?php echo date("d/m/Y", strtotime($novidade->data)); ?></p>
				</div>
			</div>
			<hr/>
			<div class="col-sm-4 image-news">
				<img src="<?php echo base_url(); ?>uploads/<?php echo $novidade->imagem; ?>" class="img-responsive"/>
			</div>
			<div class="col-sm-8">
				<?php echo $novidade->texto; ?>
			</div>
		</div>
	</article>
	<?php
		}
	}
	?>
</section>
