<div class="navbar-wrapper">
  <div class="container">

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $titulo_pagina; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <?php
              if (!empty($facebook_link)) {
                echo '<li>'.anchor($facebook_link, '<i class="fa fa-facebook-square"></i>','target="_blank"').'</li>';
              }
              if (!empty($twitter_link)) {
                echo '<li>'.anchor($twitter_link, '<i class="fa fa-twitter-square"></i>','target="_blank"').'</li>';
              }
              if (!empty($instagram_link)) {
                echo '<li>'.anchor($instagram_link, '<i class="fa fa-instagram"></i>','target="_blank"').'</li>';
              }
              if (!empty($linkedin_link)) {
                echo '<li>'.anchor($linkedin_link, '<i class"<i class="fa fa-linkedin-square"></i>','target="_blank"').'</li>';
              }
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Línguas <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Português</a></li>
                <li><a href="#">Inglês</a></li>
                <li><a href="#">Espanhol</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              if ( $this->uri->uri_string() == '' ) {
                echo '<li class="active">'.anchor(base_url(), 'Inicial').'</li>';
              } else {
                echo '<li>'.anchor(base_url(), 'Inicial').'</li>';
              }
            ?>
            <?php
              if ( $this->uri->uri_string() == 'sobre' ) {
                echo '<li class="active">'.anchor(base_url().'sobre', 'Sobre').'</li>';
              } else {
                echo '<li>'.anchor(base_url().'/sobre', 'Sobre').'</li>';
              }
            ?>
            <?php
              if ( $this->uri->uri_string() == 'novidades' ) {
                echo '<li class="active">'.anchor(base_url().'novidades', 'Novidades').'</li>';
              } else {
                echo '<li>'.anchor(base_url().'novidades', 'Novidades').'</li>';
              }
            ?>
            <?php
              if ( $this->uri->uri_string() == 'contato' ) {
                echo '<li class="active">'.anchor(base_url().'contato', 'Contato').'</li>';
              } else {
                echo '<li>'.anchor(base_url().'contato', 'Contato').'</li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>
