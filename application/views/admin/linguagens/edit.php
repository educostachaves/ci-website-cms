<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Linguagem</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      foreach($linguagens as $linguagem) {
      $attributes = array('class' => 'form-signin');
      echo form_open_multipart('admin/linguagens/editar/'.$linguagem->id, $attributes);

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
      <?php echo form_input('titulo', $linguagem->titulo, 'class="form-control" placeholder="Digite o Título" maxlength="20"'); ?>
    </div>
    <div class="form-group">
      <label>Sigla</label>
      <?php echo form_input('sigla', $linguagem->sigla, 'class="form-control" maxlength="2"'); ?>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
    <?php echo form_close(); }?>
  </div>
</div>