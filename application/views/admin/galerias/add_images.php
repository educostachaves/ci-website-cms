<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Galerias - Adicionar Imagens em <?php echo $titulo_galeria; ?></h1>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      echo form_open_multipart('admin/galerias/imagens/upload/'.$this->uri->segment("5"));

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
    <div class="row">
      <div class="col-lg-12">
        <a href="<?php echo base_url();?>admin/galerias/imagens/<?php echo $this->uri->segment("5"); ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Editar">
          <i class="fa fa-picture-o"></i>
          Visualizar Fotos da Galeria
        </a>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        Cadastrar Imagens
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="form-group">
          <p>Carregue quantas fotos forem necessárias.</p>
        </div>
        <div class="form-group">
          <label>Imagem</label>
          <input name="userfile[]" id="userfile" type="file" multiple="" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-default">Carregar Fotos</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
