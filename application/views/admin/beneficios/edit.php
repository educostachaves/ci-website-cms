<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Benefícios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      foreach($beneficios as $beneficio) {
      $attributes = array('class' => 'form-signin');
      echo form_open_multipart('admin/beneficios/editar/'.$beneficio->id, $attributes);

      if(isset($message_error) && $message_error){
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        echo $message_error;
        echo '</div>';
      }

      if(validation_errors()){
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        echo validation_errors();
        echo '</div>';
      }
    ?>
    <div class="form-group">
      <label>Link</label>
      <select class="form-control" name="link" id="link">
        <?php
          foreach ($lista_paginas as $pagina) {
            if ($pagina->url == $beneficio->link) {
              echo '<option value="'.$pagina->url.'" selected="selected">'.$pagina->titulo_br.'</option>';
            } else {
              echo '<option value="'.$pagina->url.'">'.$pagina->titulo_br.'</option>';
            }

          }
        ?>
      </select>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Português</label>
      <?php echo form_input('titulo_br', $beneficio->titulo_br, 'class="form-control" placeholder="Digite o Título" maxlength="30"'); ?>
    </div>
    <div class="form-group">
      <label>Texto Português</label>
      <?php echo form_textarea('descricao_br', $beneficio->descricao_br, 'class="form-control" maxlength="140"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Inglês</label>
      <?php echo form_input('titulo_en', $beneficio->titulo_en, 'class="form-control" placeholder="Digite o Título" maxlength="30"'); ?>
    </div>
    <div class="form-group">
      <label>Texto Inglês</label>
      <?php echo form_textarea('descricao_en', $beneficio->descricao_en, 'class="form-control" maxlength="140"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Espanhol</label>
      <?php echo form_input('titulo_es', $beneficio->titulo_es, 'class="form-control" placeholder="Digite o Título" maxlength="30"'); ?>
    </div>
    <div class="form-group">
      <label>Texto Espanhol</label>
      <?php echo form_textarea('descricao_es', $beneficio->descricao_es, 'class="form-control" maxlength="140"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <div class="row">
        <div class="col-md-8">
          <label>Imagem</label>
          <input type='file' name='imagem' class="form-control" />
        </div>
        <div class="col-md-4">
          <img src="<?php echo base_url()."uploads/".$beneficio->imagem; ?>" class="img-responsive img-thumbnail" />
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
    <?php echo form_close(); }?>
  </div>
</div>
