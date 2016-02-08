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
    <div class="form-group">
      <label>Título</label>
      <?php echo form_input('titulo', set_value('titulo'), 'class="form-control" placeholder="Digite o Título" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Descrição</label>
      <?php echo form_textarea('descricao', set_value('descricao'), 'class="form-control" maxlength="300" rows="2"'); ?>
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
