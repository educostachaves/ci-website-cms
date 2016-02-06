<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#page-top">
        <img src="<?php echo base_url(); ?>assets/images/imgLogo.png" class="img-responsive" alt="André Dourado">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right navbar-menu">
        <li>
          <a href="<?php echo base_url() ?>"
          <?php
            if ( $this->uri->uri_string() == '' ) {
              echo "class=\"active\"";
            }
          ?>>Início</a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>quem-sou"
          <?php
            if ( $this->uri->uri_string() == 'quem-sou' ) {
              echo "class=\"active\"";
            }
          ?>>Quem Sou</a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>o-que-faco"
          <?php
            if ( $this->uri->uri_string() == 'o-que-faco' ) {
              echo "class=\"active\"";
            }
          ?>>O que faço</a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>novidades"
          <?php
            if ( $this->uri->uri_string() == 'novidades' ) {
              echo "class=\"active\"";
            }
          ?>>Novidades</a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>contato"
          <?php
            if ( $this->uri->uri_string() == 'contato' ) {
              echo "class=\"active\"";
            }
          ?>>Contato</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right navbar-social">
        <li>
          <a href="#" class="social-facebook"></a>
        </li>
        <li>
          <a href="#" class="social-twitter"></a>
        </li>
        <li>
          <a href="#" class="social-instagram"></a>
        </li>
        <li>
          <a href="#" class="social-linkedin"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
