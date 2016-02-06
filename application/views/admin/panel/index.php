<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Painel Principal</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-comments fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo $total_novidades;?></div>
            <div>Novidades</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/novidades/">
        <div class="panel-footer">
          <span class="pull-left">Listar Novidades</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-comment fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">&nbsp;</div>
            <div>Novidades</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/noticias/">
        <div class="panel-footer">
          <span class="pull-left">Cadastrar Novidade</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
</div>
