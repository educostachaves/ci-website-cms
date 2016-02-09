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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
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
