<section class="container inner-content">
	<div class="row">
		<div class="col-md-12">
			<?php
				$title_novidades = array('br' => 'Novidades', 'en' => 'News', 'es' => 'Novidades');
				echo '<h2>'.$title_novidades[(empty($language)) ? 'br' : $language].'</h2>';
			?>
		</div>
	</div>
	<?php
	if (count($novidades) > 0 ) {
		foreach($novidades as $novidade) {
	?>
	<a href="<?php echo base_url().'novidades/'.$novidade->url?>">
	  <article class="row featurette">
			<div class="col-md-4">
	      <img class="featurette-image img-responsive center-block" src="<?php echo base_url().'uploads/'.$novidade->imagem; ?>" alt="<?php echo $titulo_pagina; ?>">
	    </div>
	    <div class="col-md-8">
				<h3><?php
					switch ($language) {
						case 'br':
							echo $novidade->titulo_br;
							break;
						case 'en':
							echo $novidade->titulo_en;
							break;
						case 'es':
							echo $novidade->titulo_es;
							break;
						default:
							echo $novidade->titulo_br;
							break;
					}
				?></h3>
				<p><?php echo $novidade->autor; ?> - Data: <?php echo date("d/m/Y", strtotime($novidade->data)); ?></p>
	    </div>
			<hr/>
	  </article>
	</a>
	<?php
		}
	}
	?>
</section>
