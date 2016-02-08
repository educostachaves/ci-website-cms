<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url(); ?>admin/painel">
      André Dourado
    </a>
  </div>

  <ul class="nav navbar-top-links navbar-right">
    <li>
      <span><?php echo $usuario_login; ?></span>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
        <li>
          <a href="<?php echo base_url(); ?>admin/usuarios/editar/<?php echo $id_login; ?>">
            <i class="fa fa-user fa-fw"></i> Minha Conta
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>admin/painel/configuracoes/">
            <i class="fa fa-gear fa-fw"></i> Configurações do Site
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="<?php echo base_url(); ?>admin/logout">
            <i class="fa fa-sign-out fa-fw"></i> Sair
          </a>
        </li>
      </ul>
      <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->

  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li>
          <a href="<?php echo base_url(); ?>admin/painel">
            <i class="fa fa-dashboard fa-fw"></i> Principal
          </a>
        </li>
        <!--<li>
          <a href="#">
            <i class="fa fa-file-o fa-fw"></i> Páginas
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a href="#">Listar Páginas</a>
            </li>
            <li>
              <a href="#">Cadastrar Páginas</a>
            </li>
          </ul>
        </li>-->
        <li>
          <a href="#">
            <i class="fa fa-comment-o fa-fw"></i> Novidades
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a href="<?php echo base_url(); ?>admin/novidades/">Listar Novidades</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/novidades/novo">Cadastrar Novidade</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-flag fa-fw"></i> Linguagens
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a href="<?php echo base_url(); ?>admin/linguagens/">Listar Linguagens</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/linguagens/novo">Cadastrar Língua</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
<<<<<<< HEAD
            <i class="fa fa-picture-o fa-fw"></i> Galerias
=======
            <i class="fa fa-file-text fa-fw"></i> Paginas
>>>>>>> origin/master
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
<<<<<<< HEAD
              <a href="<?php echo base_url(); ?>admin/galerias/">Listar Galerias</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/galerias/novo">Cadastrar Galeria</a>
=======
              <a href="<?php echo base_url(); ?>admin/paginas/">Listar Páginas</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/paginas/novo">Cadastrar Página</a>
>>>>>>> origin/master
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-users fa-fw"></i> Usuários
            <span class="fa arrow"></span>
          </a>
          <ul class="nav nav-second-level">
            <li>
              <a href="<?php echo base_url(); ?>admin/usuarios/">Listar Usuários</a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/usuarios/novo">Cadastrar Usuário</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
