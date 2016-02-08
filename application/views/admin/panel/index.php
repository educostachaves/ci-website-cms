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
      <a href="<?php echo base_url(); ?>admin/noticias/novo">
        <div class="panel-footer">
          <span class="pull-left">Cadastrar Novidades</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-files-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo $total_paginas;?></div>
            <div>Páginas</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/paginas/">
        <div class="panel-footer">
          <span class="pull-left">Listar Páginas</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-file-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">&nbsp;</div>
            <div>Páginas</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/paginas/novo">
        <div class="panel-footer">
          <span class="pull-left">Cadastrar Páginas</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-picture-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo $total_galerias;?></div>
            <div>Galerias</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/galerias/">
        <div class="panel-footer">
          <span class="pull-left">Listar Galerias</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-picture-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">&nbsp;</div>
            <div>Galerias</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/galerias/novo">
        <div class="panel-footer">
          <span class="pull-left">Cadastrar Galeria</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-users fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?php echo $total_usuarios;?></div>
            <div>Usuários</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/usuarios/">
        <div class="panel-footer">
          <span class="pull-left">Listar Usuários</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-user fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">&nbsp;</div>
            <div>Usuários</div>
          </div>
        </div>
      </div>
      <a href="<?php echo base_url(); ?>admin/usuarios/novo">
        <div class="panel-footer">
          <span class="pull-left">Cadastrar Usuário</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
</div>
