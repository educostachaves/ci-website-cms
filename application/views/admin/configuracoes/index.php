<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Configurações</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      foreach($configuracoes as $configuracao) {
      $attributes = array('class' => 'form-signin');
      echo form_open_multipart('admin/configuracoes/', $attributes);

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
      <?php echo form_input('nome', $configuracao->nome,
      'class="form-control" placeholder="Digite o seu nome" maxlength="100"'); ?>
    </div>
    <div class="form-group">
      <label>Endereco</label>
      <?php echo form_input('endereco', $configuracao->endereco,
      'class="form-control" placeholder="Digite o seu endereço" maxlength="100"'); ?>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Bairro</label>
        <?php echo form_input('bairro', $configuracao->bairro,
        'class="form-control" placeholder="Digite o seu bairro" maxlength="50"'); ?>
      </div>
      <div class="form-group col-md-6">
        <label>Cidade</label>
        <?php echo form_input('cidade', $configuracao->cidade,
        'class="form-control" placeholder="Digite sua cidade" maxlength="50"'); ?>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-4">
        <label>Estado</label>
        <?php
        $estadosBrasileiros = array(
          'AC'=>'Acre',
          'AL'=>'Alagoas',
          'AP'=>'Amapá',
          'AM'=>'Amazonas',
          'BA'=>'Bahia',
          'CE'=>'Ceará',
          'DF'=>'Distrito Federal',
          'ES'=>'Espírito Santo',
          'GO'=>'Goiás',
          'MA'=>'Maranhão',
          'MT'=>'Mato Grosso',
          'MS'=>'Mato Grosso do Sul',
          'MG'=>'Minas Gerais',
          'PA'=>'Pará',
          'PB'=>'Paraíba',
          'PR'=>'Paraná',
          'PE'=>'Pernambuco',
          'PI'=>'Piauí',
          'RJ'=>'Rio de Janeiro',
          'RN'=>'Rio Grande do Norte',
          'RS'=>'Rio Grande do Sul',
          'RO'=>'Rondônia',
          'RR'=>'Roraima',
          'SC'=>'Santa Catarina',
          'SP'=>'São Paulo',
          'SE'=>'Sergipe',
          'TO'=>'Tocantins'
        );
        echo form_dropdown('estado', $estadosBrasileiros, $configuracao->estado,'class="form-control"'); ?>
      </div>
      <div class="form-group col-md-8">
        <label>E-mail</label>
        <?php echo form_input('email', $configuracao->email,
        'class="form-control" placeholder="Digite o seu e-mail" maxlength="50"'); ?>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Telefone</label>
        <?php echo form_input('telefone', $configuracao->telefone,
        'class="form-control" placeholder="Digite o seu telefone" maxlength="15"'); ?>
      </div>
      <div class="form-group col-md-6">
        <label>Celular</label>
        <?php echo form_input('celular', $configuracao->celular,
        'class="form-control" placeholder="Digite o seu celular" maxlength="100"'); ?>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Facebook</label>
        <?php echo form_input('facebook', $configuracao->facebook,
        'class="form-control" placeholder="Digite o seu facebook" maxlength="50"'); ?>
      </div>
      <div class="form-group col-md-6">
        <label>Twitter</label>
        <?php echo form_input('twitter', $configuracao->twitter,
        'class="form-control" placeholder="Digite o seu twitter" maxlength="50"'); ?>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Instagram</label>
        <?php echo form_input('instagram', $configuracao->instagram,
        'class="form-control" placeholder="Digite o seu Instagram" maxlength="50"'); ?>
      </div>
      <div class="form-group col-md-6">
        <label>Linkedin</label>
        <?php echo form_input('linkedin', $configuracao->linkedin,
        'class="form-control" placeholder="Digite o seu linkedin" maxlength="50"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label>Maps</label>
      <?php echo form_textarea('maps', $configuracao->maps,
      'class="form-control" placeholder="Digite código do google maps"'); ?>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
    <?php echo form_close(); }?>
  </div>
</div>
