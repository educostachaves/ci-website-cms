<section class="container inner-content">
  <article class="row featurette">
    <?php
  	if (count($galerias) > 0 ) {
      $i = 0;
  		foreach($galerias as $galeria) {
        if ($i == 0) {
          echo '<div class="col-md-7">';
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
          echo '</div><div class="col-md-5">';
          echo '<img class="featurette-image img-responsive center-block" src="'.base_url().'uploads/'.$galeria->imagem.'" />';
          echo '</div>';
          echo '<hr/>';
          echo '<div class="col-md-12 inner-content">';
          echo '<div class="row">';
          echo '<a href="#" data-toggle="modal" data-target=".modal-'.$i.'"><div class="col-sm-4"><img class="img-thumbnail img-responsive" src="'.base_url().'uploads/'.$galeria->url_imagem.'" /></div></a>';
          echo '<div class="modal fade modal-'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <img class="img-responsive" src="'.base_url().'uploads/'.$galeria->url_imagem.'" />
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                  </div>
                </div>';
        } else {
          echo '<a href="#" data-toggle="modal" data-target=".modal-'.$i.'"><div class="col-sm-4"><img class="img-thumbnail img-responsive" src="'.base_url().'uploads/'.$galeria->url_imagem.'" /></div></a>';
          echo '<div class="modal fade modal-'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <img class="img-responsive" src="'.base_url().'uploads/'.$galeria->url_imagem.'" />
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                  </div>
                </div>';
        }
        $i++;
      }
      echo '</div></div>';
    }
  	?>
  </article>
</section>
