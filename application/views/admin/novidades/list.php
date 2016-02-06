<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novidades</h1>
    </div>
    <!-- /.col-lg-12 -->
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
        Todas as Novidades listadas
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th class="col-md-6">Título</th>
                <th class="col-md-2">Data</th>
                <th class="col-md-2">Autor</th>
                <th class="col-md-2">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($novidades) > 0 ) {
    						foreach($novidades as $novidade) {
    					?>
              <tr>
                <td><?php echo $novidade->titulo; ?></td>
                <td><?php echo date("d/m/Y", strtotime($novidade->data)); ?></td>
                <td><?php echo $novidade->autor; ?></td>
                <td class="center">
                  <a href="<?php echo base_url();?>admin/novidades/editar/<?php echo $novidade->id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="<?php echo base_url();?>admin/novidades/excluir/<?php echo $novidade->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
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
          <?php echo $paginacao; ?>
        </div>

      </div>
    </div>
  </div>
</div>
