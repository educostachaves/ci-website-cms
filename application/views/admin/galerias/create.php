<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Galerias</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      echo form_open_multipart('admin/galerias/novo');

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
    <hr/>
    <div class="form-group">
      <label>Título Português</label>
      <?php echo form_input('titulo_br', set_value('titulo_br'), 'class="form-control" placeholder="Digite o Título" maxlength="30"'); ?>
    </div>
    <div class="form-group">
      <label>Descrição Português</label>
      <?php echo form_textarea('descricao_br', set_value('descricao_br'), 'class="form-control" maxlength="140"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Inglês</label>
      <?php echo form_input('titulo_en', set_value('titulo_en'), 'class="form-control" placeholder="Digite o Título" maxlength="30"'); ?>
    </div>
    <div class="form-group">
      <label>Descrição Inglês</label>
      <?php echo form_textarea('descricao_en', set_value('descricao_en'), 'class="form-control" maxlength="140"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Título Espanhol</label>
      <?php echo form_input('titulo_es', set_value('titulo_es'), 'class="form-control" placeholder="Digite o Título" maxlength="30"'); ?>
    </div>
    <div class="form-group">
      <label>Descrição Espanhol</label>
      <?php echo form_textarea('descricao_es', set_value('descricao_es'), 'class="form-control" maxlength="140"'); ?>
    </div>
    <hr/>
    <div class="form-group">
      <label>Palavras Chave SEO</label>
      <?php echo form_input('palavras_chave', set_value('palavras_chave'), 'class="form-control" placeholder="Digite as palavras chave separadas por vírgula" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Imagem</label>
      <input type='file' name='imagem' class="form-control" />
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
    <?php echo form_close(); ?>
  </div>
</div>
