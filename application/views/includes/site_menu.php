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

            <?php
              $link_nav_linguas= array('br' => 'Línguas', 'en' => 'Language', 'es' => 'idioma');
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $link_nav_linguas[(empty($language)) ? 'br' : $language]; ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                  <?php
                    $attr_br = array('id' => 'portuguese');
                    echo form_open('change_language',$attr_br);
                    echo form_hidden('language', 'br');
                    echo form_submit('submit', 'Português','class="btn-language"');
                    echo form_close();
                  ?>
                </li>
                <li>
                  <?php
                    $attr_en = array('id' => 'english');
                    echo form_open('change_language',$attr_en);
                    echo form_hidden('language', 'en');
                    echo form_submit('submit', 'English','class="btn-language"');
                    echo form_close();
                  ?>
                </li>
                <li>
                  <?php
                    $attr_es = array('id' => 'spanish');
                    echo form_open('change_language',$attr_es);
                    echo form_hidden('language', 'es');
                    echo form_submit('submit', 'Espanhol','class="btn-language"');
                    echo form_close();
                  ?>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              $link_nav_inicial = array('br' => 'Inicial', 'en' => 'Home', 'es' => 'Inicio');
              $link_nav_sobre = array('br' => 'Sobre', 'en' => 'About', 'es' => 'Sobre');
              $link_nav_novidades = array('br' => 'Novidades', 'en' => 'News', 'es' => 'Novidades');
              $link_nav_contato = array('br' => 'Contato', 'en' => 'Contact', 'es' => 'Contacto');

              if ( $this->uri->uri_string() == '' ) {
                echo '<li class="active">'.anchor(base_url(), $link_nav_inicial[(empty($language)) ? 'br' : $language]).'</li>';
              } else {
                echo '<li>'.anchor(base_url(), $link_nav_inicial[(empty($language)) ? 'br' : $language]).'</li>';
              }
            ?>
            <?php
              if ( $this->uri->uri_string() == 'sobre' ) {
                echo '<li class="active">'.anchor(base_url().'sobre', $link_nav_sobre[(empty($language)) ? 'br' : $language]).'</li>';
              } else {
                echo '<li>'.anchor(base_url().'sobre', $link_nav_sobre[(empty($language)) ? 'br' : $language]).'</li>';
              }
            ?>
            <?php
              if ( $this->uri->uri_string() == 'novidades' ) {
                echo '<li class="active">'.anchor(base_url().'novidades', $link_nav_novidades[(empty($language)) ? 'br' : $language]).'</li>';
              } else {
                echo '<li>'.anchor(base_url().'novidades', $link_nav_novidades[(empty($language)) ? 'br' : $language]).'</li>';
              }
            ?>
            <?php
              if ( $this->uri->uri_string() == 'contato' ) {
                echo '<li class="active">'.anchor(base_url().'contato', $link_nav_contato[(empty($language)) ? 'br' : $language]).'</li>';
              } else {
                echo '<li>'.anchor(base_url().'contato', $link_nav_contato[(empty($language)) ? 'br' : $language]).'</li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>
