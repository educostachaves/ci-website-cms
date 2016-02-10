<div class="row">
  <?php
  $cta_mais_detalhes = array('br' => 'Mais Detalhes', 'en' => 'More Details', 'es' => 'Más detalles');
	if (count($beneficios) > 0 ) {
		foreach($beneficios as $beneficio) {
      echo '<div class="box col-lg-4">';
      echo '<img class="img-circle" width="140" height="140" src="'.base_url().'uploads/'.$beneficio->imagem.'" />';
      if(!empty($language)){
        switch ($language) {
          case 'br':
            echo '<h2>'.$beneficio->titulo_br.'</h2>';
            echo '<p>'.$beneficio->descricao_br.'</p>';
            break;
          case 'en':
            echo '<h2>'.$beneficio->titulo_en.'</h2>';
            echo '<p>'.$beneficio->descricao_en.'</p>';
            break;
          case 'es':
            echo '<h2>'.$beneficio->titulo_es.'</h2>';
            echo '<p>'.$beneficio->descricao_es.'</p>';
            break;
        }
      } else {
        echo '<h2>'.$beneficio->titulo_br.'</h2>';
        echo '<p>'.$beneficio->descricao_br.'</p>';
      }
      echo '<p><a class="btn btn-default" href="'.base_url().$beneficio->link.'" role="button">'.$cta_mais_detalhes[(empty($language)) ? 'br' : $language].'</a></p>';
      echo '</div>';
    }
  }
	?>
</div>
