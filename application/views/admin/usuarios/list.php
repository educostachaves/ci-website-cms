<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuários</h1>
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
    <?php
    $attributes = array('id' => 'filter-form');
    echo form_open(base_url().'admin/usuarios', $attributes);
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group col-md-4">
          <label>Usuário</label>
          <?php echo form_input('usuario', $usuario_user, 'class="form-control" placeholder="Nome do usuário"'); ?>
        </div>
        <div class="form-group col-md-4">
          <label>E-mail</label>
          <?php echo form_input('email', $email_user, 'class="form-control" placeholder="Digite o e-mail"'); ?>
        </div>
        <div class="form-group col-md-4">
          <label>Tipo</label>
          <?php $tipo_options = array(
            '' => 'Selecione o Tipo',
            '1' => 'Administrador',
            '2' => 'Usuário',
          );
          echo form_dropdown('tipo', $tipo_options, $tipo_user,'class="form-control"'); ?>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group col-md-12">
          <button type="submit" class="btn btn-primary">
            Filtrar
          </button>
          <button type="reset" class="btn btn-primary">
            Limpar
          </button>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
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
                <th class="col-md-6">Usuário</th>
                <th class="col-md-2">E-mail</th>
                <th class="col-md-2">Tipo</th>
                <th class="col-md-2">Opções</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (count($usuarios) > 0 ) {
    						foreach($usuarios as $usuario) {
    					?>
              <tr>
                <td><?php echo $usuario->nome; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td>
                  <?php
                    foreach($lista_tipo_usuario as $tipo_usuario) {
                      if ($usuario->tipo == $tipo_usuario->id) echo $tipo_usuario->descricao ;
                    }
                  ?>
                </td>
                <td class="center">
                  <a href="<?php echo base_url();?>admin/usuarios/editar/<?php echo $usuario->id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="<?php echo base_url();?>admin/usuario/excluir/<?php echo $usuario->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Excluir">
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
