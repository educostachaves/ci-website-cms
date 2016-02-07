<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Novidades</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <?php
      echo form_open_multipart('admin/novidades/novo');

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
      <label>Língua</label>
      <select name="lingua" class="form-control">
        <option value="">Selecione uma opção</option>
        <?php
        foreach ($lista_linguagens as $linguagem) {
          echo '<option value="'.$linguagem->id.'">'.$linguagem->titulo.'</option>';
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label>Título</label>
      <?php echo form_input('titulo', set_value('titulo'), 'class="form-control" placeholder="Digite o Título" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Autor</label>
      <?php echo form_input('autor', $usuario_login, 'class="form-control" maxlength="40"'); ?>
    </div>
    <div class="form-group">
      <label>Descrição</label>
      <?php echo form_textarea('descricao', set_value('descricao'), 'class="form-control" maxlength="300" rows="2"'); ?>
    </div>
    <div class="form-group">
      <label>Palavras Chave</label>
      <?php echo form_input('palavras_chave', set_value('palavras_chave'), 'class="form-control" placeholder="Digite as palavras chave separadas por vírgula" maxlength="140"'); ?>
    </div>
    <div class="form-group">
      <label>Imagem</label>
      <input type='file' name='imagem' class="form-control" />
    </div>
    <div class="form-group">
      <label>Texto</label>
      <?php echo form_textarea('texto', set_value('descricao'), 'class="form-control ckeditor"'); ?>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default">Limpar</button>
    <?php echo form_close(); ?>
  </div>
</div>
