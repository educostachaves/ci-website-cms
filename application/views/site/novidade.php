<section class="container inner-content">
  <article class="row featurette">
    <?php
  	if (count($novidades) > 0 ) {
  		foreach($novidades as $novidade) {
  	?>
    <div class="col-md-7">
			<h2><?php
      if(!empty($language)){
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
        }
      } else {
        echo $novidade->titulo_br;
      }
      ?></h2>
			<p><?php echo $novidade->autor; ?> - Data: <?php echo date("d/m/Y", strtotime($novidade->data)); ?></p>
			<hr/>
      <?php
      if(!empty($language)){
        switch ($language) {
          case 'br':
            echo $novidade->texto_br;
            break;
          case 'en':
            echo $novidade->texto_en;
            break;
          case 'es':
            echo $novidade->texto_es;
            break;
        }
      } else {
        echo $novidade->texto_br;
      }
      ?>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-responsive center-block" src="<?php echo base_url().'uploads/'.$novidade->imagem; ?>" alt="<?php echo $titulo_pagina; ?>">
    </div>
  	<?php
  		}
  	}
  	?>
  </article>
</section>
