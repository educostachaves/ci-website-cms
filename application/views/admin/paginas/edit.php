<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Página</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      foreach($paginas as $pagina) {
      $attributes = array('class' => 'form-signin');
      echo form_open_multipart('admin/paginas/editar/'.$pagina->id, $attributes);

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
      <label>Autor</label>
      <?php echo form_input('autor', $usuario_login, 'class="form-control" maxlength="40"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Português</label>
      <?php echo form_input('titulo_br', $pagina->titulo_br, 'class="form-control" placeholder="Digite o Título" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Texto Português</label>
      <?php echo form_textarea('texto_br', $pagina->texto_br, 'class="form-control ckeditor"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Inglês</label>
      <?php echo form_input('titulo_en', $pagina->titulo_en, 'class="form-control" placeholder="Digite o Título" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Texto Inglês</label>
      <?php echo form_textarea('texto_en', $pagina->texto_en, 'class="form-control ckeditor"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Espanhol</label>
      <?php echo form_input('titulo_es', $pagina->titulo_es, 'class="form-control" placeholder="Digite o Título" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Texto Espanhol</label>
      <?php echo form_textarea('texto_es', $pagina->texto_es, 'class="form-control ckeditor"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Descrição SEO</label>
      <?php echo form_textarea('descricao', $pagina->descricao, 'class="form-control" maxlength="300" rows="2"'); ?>
    </div>
    <div class="form-group">
      <label>Palavras Chave SEO</label>
      <?php echo form_input('palavras_chave', $pagina->palavras_chave, 'class="form-control" placeholder="Digite as palavras chave separadas por vírgula" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-8">
          <label>Imagem</label>
          <input type='file' name='imagem' class="form-control" />
        </div>
        <div class="col-md-4">
          <img src="<?php echo base_url()."uploads/".$pagina->imagem; ?>" class="img-responsive img-thumbnail" />
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
    <?php echo form_close(); }?>
  </div>
</div>
