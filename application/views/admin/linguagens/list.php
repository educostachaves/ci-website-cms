<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Linguagens</h1>
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
        Todas as Linguagens listadas
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th class="col-md-7">Título</th>
                <th class="col-md-3">Sigla</th>
                <th class="col-md-2">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($linguagens) > 0 ) {
    						foreach($linguagens as $linguagem) {
    					?>
              <tr>
                <td><?php echo $linguagem->titulo; ?></td>
                <td><?php echo $linguagem->sigla; ?></td>
                <td class="center">
                  <a href="<?php echo base_url();?>admin/linguagens/editar/<?php echo $linguagem->id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="<?php echo base_url();?>admin/linguagens/excluir/<?php echo $linguagem->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
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
