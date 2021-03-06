<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Benefícios</h1>
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
        Todas os benefícios listados
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th class="col-md-2">Título Português</th>
                <th class="col-md-2">Título Inglês</th>
                <th class="col-md-2">Título Espanhol</th>
                <th class="col-md-2">Link</th>
                <th class="col-md-2">Imagem</th>
                <th class="col-md-2">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($beneficios) > 0 ) {
    						foreach($beneficios as $beneficio) {
    					?>
              <tr>
                <td><?php echo $beneficio->titulo_br; ?></td>
                <td><?php echo $beneficio->titulo_en; ?></td>
                <td><?php echo $beneficio->titulo_es; ?></td>
                <td><?php echo $beneficio->link; ?></td>
                <td><img src='<?php echo base_url()."uploads/".$beneficio->imagem; ?>' class='img-responsive' width="100"/></td>
                <td class="center">
                  <a href="<?php echo base_url();?>admin/beneficios/editar/<?php echo $beneficio->id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="<?php echo base_url();?>admin/beneficios/excluir/<?php echo $beneficio->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
              <?php
                  }
                } else {
              ?>
              <tr>
                <td colspan="6">Sem dados na listagem</td>
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
