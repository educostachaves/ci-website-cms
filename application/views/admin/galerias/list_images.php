<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Galerias - Lista de Imagens</h1>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
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
    <div class="panel panel-default">
      <div class="panel-heading">
        Todas as imagens da galeria listadas
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th class="col-md-4">Thumb</th>
                <th class="col-md-4">URL</th>
                <th class="col-md-2">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($imagens) > 0 ) {
    						foreach($imagens as $imagem) {
    					?>
              <tr>
                <td><img src='<?php echo base_url()."uploads/".$imagem->url; ?>' class='img-responsive' width="100"/></td>
                <td><?php echo $imagem->url; ?></td>
                <td class="center">
                  <a href="<?php echo base_url();?>admin/galerias/imagens/editar/<?php echo $imagem->id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fa fa-pencil"></i>
                  <a href="<?php echo base_url();?>admin/galerias/imagem/excluir/<?php echo $imagem->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php
                  }
                } else {
              ?>
              <tr>
                <td colspan="4">Sem dados na listagem</td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
