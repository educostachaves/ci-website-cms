<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novidades</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
    $attributes = array('class' => 'form-users');
    echo form_open(base_url().'admin/usuarios/novo', $attributes);

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
      <label>Nome</label>
      <?php echo form_input('nome', set_value('nome'), 'class="form-control" placeholder="Digite seu Nome"'); ?>
    </div>
    <div class="form-group">
      <label>E-mail</label>
      <?php echo form_input('email', set_value('email'), 'class="form-control" placeholder="Digite seu e-mail"'); ?>
    </div>
    <div class="form-group">
      <label>Tipo:</label>
      <?php $tipo_options = array(
            '1' => 'Administrador',
            '2' => 'Usuário'
          );
          echo form_dropdown('tipo', $tipo_options, '1','class="form-control"'); ?>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <?php echo form_password('password', '', 'class="form-control" placeholder="Password"'); ?>
    </div>
    <div class="form-group">
        <label>Confirmar:</label>
        <?php echo form_password('password2', '', 'class="form-control" placeholder="Password confirm"'); ?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">
        Registrar
      </button>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
