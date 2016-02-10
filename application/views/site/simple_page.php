
<div class="container inner-content">
  <div class="row featurette">
    <?php
  	if (count($contents) > 0 ) {
  		foreach($contents as $content) {
  	?>
    <div class="col-md-7">
			<h2><?php
      if(!empty($language)){
        switch ($language) {
          case 'br':
            echo $content->titulo_br;
            break;
          case 'en':
            echo $content->titulo_en;
            break;
          case 'es':
            echo $content->titulo_es;
            break;
        }
      } else {
        echo $content->titulo_br;
      }
      ?></h2>
      <?php
      if(!empty($language)){
        switch ($language) {
          case 'br':
            echo $content->texto_br;
            break;
          case 'en':
            echo $content->texto_en;
            break;
          case 'es':
            echo $content->texto_es;
            break;
        }
      } else {
        echo $content->texto_br;
      }
      ?>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-responsive center-block" src="<?php echo base_url().'uploads/'.$content->imagem; ?>" alt="<?php echo $titulo_pagina; ?>">
    </div>
  	<?php
  		}
  	}
  	?>

  </div>
</div>
