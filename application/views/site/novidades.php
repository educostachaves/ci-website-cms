
<section class="content-fluid inside-section" >
	<?php
	if (count($novidades) > 0 ) {
		foreach($novidades as $novidade) {
	?>
	<article class="col-sm-10 col-sm-offset-1 news-content">
		<div class="col-sm-6 image-news">
			<img src="<?php echo base_url(); ?>uploads/<?php echo $novidade->imagem; ?>" class="img-responsive"/>
		</div>
		<div class="col-sm-5 col-sm-offset-1 content-news">
			<h3><?php echo $novidade->titulo; ?></h3>
			<p><?php echo $novidade->descricao; ?></p>
			<p class="text-right"><a href="<?php echo base_url(); ?>novidades/<?php echo $novidade->url; ?>">Leia Mais</a></p>
			<hr/>
			<p class="text-right"><?php echo date("d/m/Y", strtotime($novidade->data)); ?></p>
		</div>
	</article>
	<?php
		}
	} else {
	?>
	<article class="col-sm-10 col-sm-offset-1 news-content">
		<h2>Não há novidades</h2>
	</article>
	<?php
	}
	?>
</section>
