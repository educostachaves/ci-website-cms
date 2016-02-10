<section class="container inner-content">
	<div class="row">
		<div class="col-md-12">
			<?php
				$title_galerias = array('br' => 'Galerias', 'en' => 'Galleries', 'es' => 'Galerías');
				echo '<h2>'.$title_galerias[(empty($language)) ? 'br' : $language].'</h2>';
			?>
		</div>
	</div>
	<?php
	if (count($galerias) > 0 ) {
		foreach($galerias as $galeria) {
	?>
	<a href="<?php echo base_url().'galerias/'.$galeria->url?>">
	  <article class="row featurette">
			<div class="col-md-4">
	      <img class="featurette-image img-responsive center-block" src="<?php echo base_url().'uploads/'.$galeria->imagem; ?>" alt="<?php echo $titulo_pagina; ?>">
	    </div>
	    <div class="col-md-8">
				<?php
        if(!empty($language)){
          switch ($language) {
            case 'br':
              echo '<h3>'.$galeria->titulo_br.'</h3>';
							echo '<p>'.$galeria->descricao_br.'</p>';
              break;
            case 'en':
              echo '<h3>'.$galeria->titulo_en.'</h3>';
							echo '<p>'.$galeria->descricao_en.'</p>';
              break;
            case 'es':
              echo '<h3>'.$galeria->titulo_es.'</h3>';
							echo '<p>'.$galeria->descricao_es.'</p>';
              break;
          }
        } else {
					echo '<h3>'.$galeria->titulo_br.'</h3>';
					echo '<p>'.$galeria->descricao_br.'</p>';
        }
        ?></h3>
	    </div>
			<hr/>
	  </article>
	</a>
	<?php
		}
	}
	?>
</section>
