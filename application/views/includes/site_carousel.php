<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
  	if (count($carousel_home) > 0 ) {
      $i = 0;
      $len = count($carousel_home);
  		for($i = 0; $i < $len ; $i++) {
        if ($i == 0) {
          echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
        } else {
          echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
        }
      }
    }
  	?>
  </ol>
  <div class="carousel-inner" role="listbox">
  <?php
  $cta_saiba_mais = array('br' => 'Saiba Mais', 'en' => 'More', 'es' => 'Saiba Mas');
	if (count($carousel_home) > 0 ) {
    $i = 0;
		foreach($carousel_home as $slide) {
      if ($i == 0) {
        echo '<div class="item active">';
      } else {
        echo '<div class="item">';
      }
      echo '<img src="'.base_url().'uploads/'.$slide->imagem.'" />';
      echo '<div class="container"><div class="carousel-caption">';
      if(!empty($language)){
        switch ($language) {
          case 'br':
            echo '<h1>'.$slide->titulo_br.'</h1>';
            echo '<p>'.$slide->descricao_br.'</p>';
            break;
          case 'en':
            echo '<h1>'.$slide->titulo_en.'</h1>';
            echo '<p>'.$slide->descricao_en.'</p>';
            break;
          case 'es':
            echo '<h1>'.$slide->titulo_es.'</h1>';
            echo '<p>'.$slide->descricao_es.'</p>';
            break;
        }
      } else {
        echo '<h1>'.$slide->titulo_br.'</h1>';
        echo '<p>'.$slide->descricao_br.'</p>';
      }
      echo '<p><a class="btn btn-lg btn-primary" href="'.base_url().$slide->link.'" role="button">'.$cta_saiba_mais[(empty($language)) ? 'br' : $language].'</a></p>';
      echo '</div></div></div>';
      $i++;
    }
  }
	?>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="fa fa-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="fa fa-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
