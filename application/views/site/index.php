<?php $this->load->view('includes/site_carousel',$data['carousel_home'] = $carousel_home); ?>

<div class="container marketing">

  <?php $this->load->view('includes/site_marketing'); ?>
  <hr class="featurette-divider">

  <div class="row featurette">
    <?php
  	if (count($contents) > 0 ) {
  		foreach($contents as $content) {
  	?>
      <div class="col-md-7">
        <?php
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
            default:
              echo $content->texto_br;
              break;
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
